<?php

namespace App\View\Components\Landlord;

use App\Models\Menu as MenuAlias;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * @var MenuAlias
     */
    public Collection $menu;

    /**
     * Create a new component instance.
     *
     * @param MenuAlias $menu
     */
    public function __construct(MenuAlias $menu)
    {
        $this->menu = $menu->all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {

        return view('components.landlord.menu')->with('menus', $this->menu);
    }
}
