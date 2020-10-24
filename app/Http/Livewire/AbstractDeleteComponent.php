<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire;


use App\Actions\DeleteItem;
use App\Actions\ValidateDeletion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

abstract class AbstractDeleteComponent extends Component
{
    /**
     * The team instance.
     *
     * @var mixed
     */
    public $rows;

    /**
     * Indicates if team deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingItemDeletion = false;

    /**
     * Mount the component.
     *
     * @param  mixed  $rows
     * @return void
     */
    public function mount($rows)
    {
        $this->rows = $rows;
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

        $deleter->delete($this->rows);

        $this->success();
    }


    public function render()
    {
        return view(landlord_view('delete-form'));
    }

   abstract public function success();
}
