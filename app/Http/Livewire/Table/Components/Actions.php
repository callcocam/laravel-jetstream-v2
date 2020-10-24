<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Table\Components;

class Actions
{

    /**
     * @param $route
     * @return array
     */
    public static function make($route): array
    {
        $action = new static();
        return [
            $action->edit($route),
            $action->show($route),
            $action->destroy($route),
        ];
    }
    /**
     * @param $route
     * @return Delete
     */
    public function destroy($route): Delete
    {
        return  Delete::make('Delete');
    }
    /**
     * @param $route
     * @return Link
     */
    public function edit($route): Link
    {
        return  Link::make('Edit')->href(function ($model) use ($route){
            return route(sprintf("%s.edit",$route), $model->id);
        });
    }
    /**
     * @param $route
     * @return Link
     */
    public function show($route): Link
    {
        return  Link::make('Show')->href(function ($model) use ($route){
            return route(sprintf("%s.destroy",$route), $model->id);
        });
    }
}
