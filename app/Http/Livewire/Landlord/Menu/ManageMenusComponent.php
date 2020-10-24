<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Landlord\Menu;

use App\Http\Livewire\AbstractFormComponent;
use App\Http\Livewire\Table\Column;
use App\Models\MenuType;

class ManageMenusComponent extends AbstractFormComponent
{
    protected $perPage = 100000;

    public $groups = 'index';

    /**
     * The "add team member" form state.
     *
     * @var array
     */
    public $addMenuTypeForm = [];


    protected function setProperties($rows){

        if($rows){
            foreach ($rows->toArray() as $name => $value):
                $this->state[$name] = $value;
            endforeach;
        }

        $this->addMenuTypeForm = $this->rows->menu_type->pluck('id','id')->toArray();
    }

    public function load(){

        $this->paginationEnabled = false;

        $this->updatesQueryString['search'] = $this->search;

        return $this->filter();
    }

    public function addMenuType($menu){

        if(in_array($menu, $this->addMenuTypeForm)){
           unset($this->addMenuTypeForm[$menu]);
        }
        else{
            $this->addMenuTypeForm[$menu]= $menu;
        }

        $this->rows->menu_type()->sync($this->addMenuTypeForm);

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

            $this->builder = app(MenuType::class)->query();

        }
        return $this->builder;
    }

    /**
     * @return mixed
     */
    public function view()
    {
        return landlord_view('menu.manage-menus');
    }
}
