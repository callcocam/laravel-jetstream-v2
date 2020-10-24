<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Landlord;

use Livewire\Component;

class NavigationDropdown extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-navigation-dropdown' => '$refresh',
    ];

    public function render()
    {

        return view('livewire.landlord.navigation-dropdown');
    }
}
