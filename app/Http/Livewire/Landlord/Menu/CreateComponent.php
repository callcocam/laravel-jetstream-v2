<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Landlord\Menu;

use App\Http\Livewire\AbstractFormComponent;
use App\Models\Menu;

class CreateComponent extends AbstractFormComponent
{
    public $extras = ['menu_type_id'];
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'urlChanged',
    ];
    /**
     * @return mixed
     */
    public function success()
    {
        $this->emit('refresh');

        $this->builder->menu_type()->sync($this->state['menu_type_id']);

        $this->state = $this->fillables();
    }

    public function urlChanged($data){

        $this->state = $this->fillables($data);


    }
    /**
     * @return mixed
     */
    public function query()
    {
        if(!$this->builder){

            $this->builder = app(Menu::class);
        }
        return $this->builder;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    /**
     * @return mixed
     */
    public function view()
    {
        return landlord_view('menu.create');
    }
}
