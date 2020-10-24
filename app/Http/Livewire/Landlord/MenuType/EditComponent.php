<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Landlord\MenuType;

use App\Http\Livewire\AbstractFormComponent;
use App\Models\MenuType;
use Illuminate\Database\Eloquent\Model;

class EditComponent extends AbstractFormComponent
{

    /**
     * @return mixed
     */
    public function success()
    {
        return  redirect()->route('menu-types.index');
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return app(MenuType::class);
    }

    /**
     * @return mixed
     */
    public function view()
    {
        return landlord_view('menu-type.edit');
    }
}
