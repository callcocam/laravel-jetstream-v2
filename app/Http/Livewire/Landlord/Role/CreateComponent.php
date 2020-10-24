<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Landlord\Role;

use App\Http\Livewire\AbstractFormComponent;
use App\Models\Menu;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class CreateComponent extends AbstractFormComponent
{

    /**
     * @return mixed
     */
    public function success()
    {
        $this->emit('refresh');

        $this->state = $this->fillables();
    }

    /**
     * @return mixed
     */
    public function query()
    {
        if(!$this->builder){

            $this->builder = app(Role::class);
        }
        return $this->builder;
    }
    public function rules()
    {
        return [ 'name' => ['required', 'string', 'max:255']];
    }

    /**
     * @return mixed
     */
    public function view()
    {
       return landlord_view('role.create');
    }
}
