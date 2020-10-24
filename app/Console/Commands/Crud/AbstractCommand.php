<?php

namespace App\Console\Commands\Crud;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

abstract class AbstractCommand extends Command
{

    protected $type="";

    protected $stub = "list";

    protected $namespace = "App/Models";

    protected $path;

    protected $directory;


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->generate();
    }

    protected function generate(){

        $name =  $this->name();

        $namespace= $this->add_namespace();

        $model = $this->model();

        $stub = $this->getStub();

        $stub = str_replace('DummyNameSpace', str_replace("/", "\\", sprintf("%s%s",$this->namespace, $namespace)), $stub);
        $stub = str_replace('DummyConnection', $this->option("connection"), $stub);
        $stub = str_replace('DummyModel', $model, $stub);
        $stub = str_replace('DummyComponent', $model, $stub);
        $stub = str_replace('DummyRoute', Str::slug(Str::plural($model)), $stub);
        $stub = str_replace('DummyFillable', "'id'", $stub);


        File::ensureDirectoryExists(str_replace("\\", "/", $this->directory));

        if (!File::exists(str_replace("\\", "/", $this->path)) || $this->confirm($name . ' already exists. Overwrite it?')) {
            File::put(str_replace("\\", "/", $this->path), $stub);
            $this->info($name . ' was made!');
        }
    }

    abstract protected function getStub();

    protected function name(){

        $explode = explode("/", $this->namespaceAndName());

        return  Arr::last($explode);
    }

    protected function model(){

        return str_replace($this->type,'', $this->name());
    }

    protected function namespaceAndName(){

        return sprintf("%s%s",$this->argument('name'), $this->type);
    }

    protected function add_namespace(){

        $namespaceAndName = $this->namespaceAndName();

        $name =  $this->name();

        $namespace="";

        if($name !=$namespaceAndName){

            $namespace = Str::before($namespaceAndName, sprintf("/%s",$name));

            $namespace = sprintf("/%s",ucwords($namespace, '/'));

        }

        return $namespace;
    }
}
