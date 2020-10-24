<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Landlord\Role;

use App\Http\Livewire\AbstractListComponent;
use App\Http\Livewire\Table\Column;
use App\Http\Livewire\Table\Columns\Status;
use App\Http\Livewire\Table\Components\Delete;
use App\Http\Livewire\Table\Components\Link;
use App\Models\Role;

class ListComponent extends AbstractListComponent
{


    protected function query(){

        if(!$this->builder){

            $this->builder = Role::query();

        }
        return $this->builder;
    }

    public function view()
    {
        return landlord_view('role.list');
    }

    public function columns()
    {
        return [
            Column::make('id')->hidden(),
            Column::make('name')->searchable()->sortable(),
            Column::make('special'),
            Status::make(),
            Column::make('Actions')->components([
                Link::make('Edit')->href(function ($model){
                    return route('roles.edit', $model->id);
                }),
                Delete::make("Delete")
            ]),
        ];
    }

}
