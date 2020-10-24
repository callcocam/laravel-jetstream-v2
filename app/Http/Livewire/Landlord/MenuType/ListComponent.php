<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Landlord\MenuType;

use App\Http\Livewire\AbstractListComponent;
use App\Http\Livewire\Table\Column;
use App\Http\Livewire\Table\Columns\Status;
use App\Http\Livewire\Table\Components\Delete;
use App\Http\Livewire\Table\Components\Link;
use App\Models\MenuType;

class ListComponent extends AbstractListComponent
{

    public function view()
    {
        return landlord_view('menu-type.list');
    }

    /**
     * @return mixed
     */
    protected function query()
    {
        if(!$this->builder){

            $this->builder = MenuType::query();

        }
        return $this->builder;
    }

    public function columns()
    {
        return [
            Column::make('id')->hidden(),
            Column::make('name')->searchable()->sortable(),
            Status::make(),
            Column::make('Actions')->components([
                Link::make('Add menus')->href(function ($model){
                    return route('menus.index', ['menu_type_id'=>$model->id]);
                }),
                Link::make('Edit')->href(function ($model){
                    return route('menu-types.edit', $model->id);
                }),
                Delete::make("Delete")
            ]),
        ];
    }
}
