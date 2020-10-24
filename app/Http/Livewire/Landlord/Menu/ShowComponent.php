<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Landlord\Menu;

use Livewire\Component;

class ShowComponent extends Component
{

    protected $rows;

    protected function query(){

        return \App\Models\Menu::query();
    }

    public function mount(){

        $data = $this->query()->find(request()->route('id'));

        $this->rows = $data;
    }

    public function load(){

        return $this->rows;
    }


    public function render()
    {
        return view('livewire.landlord.menu.show');
    }
}
