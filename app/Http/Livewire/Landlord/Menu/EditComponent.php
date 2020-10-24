<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Landlord\Menu;

use App\Http\Livewire\AbstractFormComponent;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;

class EditComponent extends AbstractFormComponent
{

    /**
     * @return mixed
     */
    public function success()
    {
        return  redirect()->route('menus.index');
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return app(Menu::class);
    }

    /**
     * @return mixed
     */
    public function view()
    {
        return landlord_view('menu.edit');
    }
}
