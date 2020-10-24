<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class AbstractController extends Controller
{

    protected string $model;
    protected array $results = [];
    protected string $template = "admin";
    protected string $prefix = "admin";

    public function __construct()
    {
        $this->prefix = app('currentTenant')->prefix;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (!Gate::denies(Route::currentRouteName())){
            abort('401','Not authorad');
        }

        $this->results['params'] = request()->query();

       return view(sprintf("%s.%s.index", $this->prefix, $this->template),$this->results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        if (!Gate::denies(Route::currentRouteName())){
            abort('401','Not authorad');
        }

        $this->results['params'] = request()->query();

        return view(sprintf("%s.%s.create", $this->prefix, $this->template),$this->results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        if (!Gate::denies(Route::currentRouteName())){
            abort('401','Not authorad');
        }

        if($this->model){

            $this->results['rows'] = app($this->model)->findOrFail($id);

        }
        $this->results['params'] = request()->query();

        $this->results['id'] = $id;

        return view(sprintf("%s.%s.show", $this->prefix, $this->template),$this->results);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        if (!Gate::denies(Route::currentRouteName())){
            abort('401','Not authorad');
        }
        if($this->model){

            $this->results['rows'] = app($this->model)->findOrFail($id);

        }
        //dd(LoadPermissionTask::make()->load()->save());
        return view(sprintf("%s.%s.edit", $this->prefix, $this->template),$this->results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
