<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;
class AdminMenuComponent extends Component
{
    public $mnitems;
    public function __construct()
    {
        $this -> mnitems = Menu::where("IsActive", true)->orderBy("Id","asc")->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-menu-component');
    }
}
