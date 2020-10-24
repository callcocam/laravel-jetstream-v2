<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Tasks;


use App\Models\Permission;
use Illuminate\Support\Str;

class LoadPermissionTask
{

    /**
     * @var array
     */
    private array $routes = [];

    /**
     * @var array
     */
    private array $ignore = ['ignition', 'auth', 'remove-file', 'auto-route', 'translate', 'profile'];

    /**
     * @var array
     */
    private array $required = ['store', 'edit', 'update', 'create', 'show', 'index'];


    public static function make()
    {

        $make = new static();

        return $make;
    }

    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function save(){

        if (isset($this->routes["namedRoutes"]) && $this->routes["namedRoutes"]){

            foreach ($this->routes["namedRoutes"] as $route =>$data){
               if(!Permission::query()->where('name', $route)->first()){
                   $group = explode('.', $route);
                   Permission::factory()->create([
                       'name'=>$route,
                       'slug'=>$route,
                       'groups'=> last($group),
                       'description'=>Str::title($route),
                       'created_at'=>now()->format("Y-m-d H:i:s"),
                       'updated_at'=>now()->format("Y-m-d H:i:s")
                   ]);
               }
            }
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function load()
    {

        //$this->permission->slug_fixed = true;

        $options = [];

        foreach (\Route::getRoutes() as $route) {

            if (isset($route->action['as'])) :

                $data = explode(".", $route->action['as']);

                if ($this->getIgnore($data)) :

                    if ($this->getRequired($data)) :
                        //{"admin":{"uri":"admin","methods":["GET","HEAD"],"domain":null}
                        if (!in_array($route->action['as'], $options)) {
                            $options[$route->action['as']] = [
                                "uri"=>$route->uri,
                                "methods"=>$route->methods,
                                "domain"=>null,
                            ];
                        }

                    endif;

                endif;

            endif;
        }
        $this->routes =  [
            "namedRoutes" => $options,
            "baseUrl" => request()->getSchemeAndHttpHost(),
            "baseProtocol" => request()->getScheme(),
            "baseDomain" => request()->getHost(),
            "basePort" => false
        ];
        return $this;
    }


    private function getIgnore($value)
    {

        $result = true;

        foreach ($this->ignore as $item) {

            if (in_array($item, $value)) {

                $result = false;
            }
        }

        return $result;
    }


    private function getRequired($value)
    {

        $result = false;

        foreach ($this->required as $item) {

            if (in_array($item, $value)) {

                $result = true;
            }
        }

        return $result;
    }
}
