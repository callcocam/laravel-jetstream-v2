<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Landlord\Menu;

use App\Http\Livewire\AbstractListComponent;
use App\Http\Livewire\Table\Column;
use App\Http\Livewire\Table\Components\Actions;
use App\Models\Menu;
use App\Models\MenuType;

class ListComponent extends AbstractListComponent
{

    public $menuTypes;

    public $menu_type_id;

    public function view()
    {
        return landlord_view('menu.list');
    }

    public function refresh(){

        $this->updatesQueryString['search'] = $this->search;

        if ($this->menu_type_id){

            $this->queryString['menu_type_id'] = ['except' => ''];

            $this->emit('urlChanged', ['menu_type_id'=>$this->menu_type_id]);

        }


        $data = $this->filter();

        $this->rows = $data;

        return $this->rows;

    }

    public function columns()
    {
        return [
            Column::make('id')->hidden(),
            Column::make('name')->sortable()->searchable(),
            Column::make('Actions')->components(Actions::make('menus')),
        ];
    }

    /**
     * @return mixed
     */
    protected function query()
    {

        $this->menuTypes = MenuType::all();

        if(!$this->builder){

            $this->builder = MenuType::query()->find($this->menu_type_id);

        }
        if($this->menu_type_id){
            if ($this->builder){
                return $this->builder->menus();
            }
        }

        $this->builder = Menu::query();


        return $this->builder;
    }
}
