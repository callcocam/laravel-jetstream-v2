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

class EditComponent extends AbstractFormComponent
{

    /**
     * @return mixed
     */
    public function success()
    {
        return  redirect()->route('roles.index');
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return app(Role::class);
    }

    /**
     * @return mixed
     */
    public function view()
    {
       return landlord_view('role.edit');
    }
}
