<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire;


use App\Actions\DeleteItem;
use App\Actions\ValidateDeletion;
use App\Http\Livewire\Traits\Foreign;
use App\Http\Livewire\Traits\Pagination;
use App\Http\Livewire\Traits\Search;
use App\Http\Livewire\Traits\Select;
use App\Http\Livewire\Traits\Sorting;
use Livewire\Component;

abstract class AbstractListComponent extends Component
{
    use Search, Select, Pagination, Sorting, Foreign;

    protected $queryString = [
        'per_page' => ['except' => '12'],
        'search' => ['except' => ''],
        'page' => ['except' => '1'],
        'direction' => ['except' => 'desc'],
        'column' => ['except' => 'created_at'],
    ];

    /**
     * Indicates if the application is confirming if a team member should be removed.
     *
     * @var bool
     */
    public $checkbox  = false;
    public $tableHeaderEnabled  = true;
    public $tableHeaderClass   = '';


    public $confirmingRemoval = false;

    /**
     * The ID of the team member being removed.
     *
     * @var int|null
     */
    public $IdBeingRemoved = null;

    protected $rows;
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh',
    ];
   abstract protected function query();

   abstract protected function view();

    /**
     * @param array $params
     */
    public function mount($params=[]){



        $this->refresh();

    }

    public function load(){

        if (!$this->rows){
            $this->refresh();
        }
        return $this->rows;
    }

    public function refresh(){

        $this->updatesQueryString['search'] = $this->search;
        $data = $this->filter();
        $this->rows = $data;
        return $this->rows;

    }


    public function render()
    {
        return view($this->view())->with('models', $this->load())->with('columns', $this->columns());
    }

    /**
     * @return mixed
     */
    public function columns()
    {
        return $this->query()->getModel()->getFillable();
    }


    /**
     * Confirm that the given team member should be removed.
     *
     * @param  mixed  $IdBeingRemoved
     * @return void
     */
    public function confirmRemoval($IdBeingRemoved)
    {
        $this->confirmingRemoval = true;

        $this->IdBeingRemoved = $this->query()->find( $IdBeingRemoved );
    }

    /**
     * Delete the team.
     *
     * @param  \App\Actions\ValidateDeletion  $validator
     * @param  \App\Actions\DeleteItem  $deleter
     * @return void
     */
    public function deleteItem(ValidateDeletion $validator, DeleteItem $deleter)
    {
        //$validator->validate(Auth::user(), $this->rows);

        $deleter->delete($this->IdBeingRemoved);

        $this->confirmingRemoval = false;

        $this->IdBeingRemoved = null;

    }

    public function builder(){

        return $this->builder;
    }
}
