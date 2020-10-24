<?php

if(!function_exists('hasRoute')){

    /**
     * Nome da rota a ser verificado
     * @param $route
     * @return bool
     */
    function hasRoute($route){

        return \Illuminate\Support\Facades\Route::has($route);

    }

}

if(!function_exists('x_route')){

    /**
     * Nome da rota a ser verificado
     * @param $route
     * @return bool
     */
    function x_route($route, $params=[]){
        $current = sprintf("%s.%s", app('currentTenant')->prefix, $route);
        if(\Illuminate\Support\Facades\Route::has($current)){
            return route($current,$params);
        }
        return url(sprintf("%s/%s", app('currentTenant')->prefix, $route));
    }

}

if(!function_exists('routeIs')){

    /**
     * Nome da rota a ser verificado
     * @param $route
     * @return bool
     */
    function routeIs($route){
        return request()->routeIs($route);
    }

}

if(!function_exists('jet_view')){

    /**
     * Nome da rota a ser verificado
     * @param $view
     * @param $param
     * @return bool
     */
    function jet_view($view){
        return sprintf("jets-stream.%s", $view);
    }

}


if(!function_exists('landlord_view')){

    /**
     * Nome da rota a ser verificado
     * @param $view
     * @return bool
     */
    function landlord_view($view){
        return sprintf("livewire.landlord.%s-component", $view);
    }

}

if(!function_exists('icon_view')){

    /**
     * Nome da rota a ser verificado
     * @param $view
     * @return bool
     */
    function icon_view($view){
        return sprintf("includes.icons.%s", $view);
    }

}

if(!function_exists('table_view')){

    /**
     * Nome da rota a ser verificado
     * @param $view
     * @return bool
     */
    function table_view($view){
        return sprintf("table::%s", $view);
    }

}
if(!function_exists('table_views_includes')){

    /**
     * Nome da rota a ser verificado
     * @param $view
     * @return bool
     */
    function table_views_includes($view="_columns"){
        return table_view(sprintf("includes.%s", $view));
    }

}



if (!function_exists('check_status')) {
    /**
     * Get the configuration path.
     *
     * @param $status
     * @param string[] $options
     * @return string
     */
    function check_status($status, $options = [
        'published' => "green", 'draft' => "blue", 'deleted' => "red"
    ])
    {
        if (isset($options[$status]))
            return $options[$status];


        return "yellow";
    }
}
