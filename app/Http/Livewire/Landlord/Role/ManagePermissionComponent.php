<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Landlord\Role;

use App\Http\Livewire\AbstractFormComponent;
use App\Http\Livewire\Table\Column;
use App\Models\Permission;
use Illuminate\Support\Arr;

class ManagePermissionComponent extends AbstractFormComponent
{
    protected $perPage = 100000;

    public $groups = 'index';

    /**
     * The "add team member" form state.
     *
     * @var array
     */
    public $addPermissionForm = [];

    public $filterGroups = ['index'=>'Listar', 'create'=>'Cadastrar', 'show'=>'Visualizar', 'edit'=>'Editar'];

    protected function setProperties($rows){

        if($rows){
            foreach ($rows->toArray() as $name => $value):
                $this->state[$name] = $value;
            endforeach;
        }

        $this->addPermissionForm = $this->rows->permissions->pluck('slug','slug')->toArray();
    }

    public function load(){

        $this->paginationEnabled = false;

        $this->updatesQueryString['search'] = $this->search;

        $rows = $this->filter();

        $groups = ['index', 'create', 'show', 'edit', 'update','store'];

        $permissions = [];

        foreach ($groups as $group){
            $data = collect($rows)->filter(function ($permission) use ($group){
                return $permission->groups == $group;
            });
            $permissions[$group] = $data;
        }
        return $rows;
    }

    public function addPermission($permission){

        if(in_array($permission, $this->addPermissionForm)){
           unset($this->addPermissionForm[$permission]);
        }
        else{
            $this->addPermissionForm[$permission]= $permission;
        }

        $this->rows->syncPermissions($this->addPermissionForm);

    }

    /**
     * @return mixed
     */
    public function success()
    {
        // TODO: Implement success() method.
    }

    public function columns()
    {
        return [
           Column::make('id'),
           Column::make('name')->searchable(),
        ];
    }

    /**
     * @return mixed
     */
    public function query()
    {
        if(!$this->builder){

            $this->builder = app(Permission::class)->query()->where('groups',$this->groups)    ;

        }
        return $this->builder;
    }

    /**
     * @return mixed
     */
    public function view()
    {
        return landlord_view('role.manage-permission');
    }
}
