<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire;


use App\Actions\CreateItem;
use App\Actions\UpdateItem;
use App\Http\Livewire\Traits\Foreign;
use App\Http\Livewire\Traits\Pagination;
use App\Http\Livewire\Traits\Search;
use App\Http\Livewire\Traits\Select;
use App\Http\Livewire\Traits\Sorting;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

abstract class AbstractFormComponent extends Component
{
    use Search, Select, Pagination, Sorting, Foreign;

    protected $queryString = [
        'search' => ['except' => '']
    ];
    /**
     * The team instance.
     *
     * @var mixed
     */
    public $rows;
    public $_id;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * The component's state.
     *
     * @var array
     */
    public $extras = [];

    /**
     * The component's state.
     *
     * @var array
     */
    public $defaults = ['status'=>'published'];

    /**
     * Mount the component.
     *
     * @param  mixed  $rows
     * @return void
     */
    public function mount($rows,$_id=null)
    {
        $this->rows = $rows;
        $this->_id = $_id;
        $this->setProperties($rows);
    }

    protected function setProperties($rows){

        if($rows){
            foreach ($rows->toArray() as $name => $value):
                $this->state[$name] = $value;
            endforeach;
        }
        else{
            $this->state = $this->fillables();
        }

    }

    /**
     * Update the team's name.
     *
     * @param  \App\Contracts\UpdatesItems  $updater
     * @return void
     */
    public function updateItem(UpdateItem $updater)
    {
        Validator::make( $this->state, $this->getRules())->validateWithBag('updateItem');

        $this->resetErrorBag();

        $updater->update($this->user, $this->rows, array_filter($this->state));

        $this->emit('saved');

       // $this->emit('refresh-navigation-dropdown');

        $this->success();
    }

    /**
     * Update the team's name.
     *
     * @param  \App\Actions\CreateItem  $updater
     * @return void
     */
    public function createItem(CreateItem $updater)
    {

        Validator::make( $this->state, $this->getRules())->validateWithBag('createItem');

        $this->resetErrorBag();

       $this->builder = $updater->create($this->query(), array_filter($this->state));

        $this->emit('saved');

        $this->success();
       // $this->emit('refresh-navigation-dropdown');


    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {

        return Auth::user();
    }

    abstract public function success();

    abstract public function query();

    abstract public function view();

    /**
     * @return mixed
     */
    public function columns()
    {
        return $this->query()->getFillable();
    }

    public function load(){}

    public function render()
    {
        return view($this->view())->with('columns',$this->columns())->with('models',$this->load());
    }


    /**
     * @return mixed
     */
    public function fillables($data=[])
    {

        $fillables = array_merge($this->columns(), $this->extras);

        $columns = [];

        if($fillables){
            foreach ($fillables as $name):
                $columns[$name] = request()->query($name,Arr::get($this->defaults, $name,Arr::get($data, $name,'')));
            endforeach;
        }
        return $columns;
    }

    public function builder(){
        return $this->builder;
    }

    protected function rules(){
        return [];
    }
}
