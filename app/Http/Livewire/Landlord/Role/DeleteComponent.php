<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Landlord\Role;

use App\Http\Livewire\AbstractDeleteComponent;

class DeleteComponent extends AbstractDeleteComponent
{



    /**
     * @return mixed
     */
    public function success()
    {
      return  redirect()->route('roles.index');
    }
}
