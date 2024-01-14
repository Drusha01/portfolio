<?php

namespace App\Livewire\Components\Sidebar\AdminSidebar;

use Livewire\Component;
use Illuminate\Http\Request;

class AdminSidebar extends Component
{
    public $mode;
    public $background = "282828";
    public $color = 'fff';
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }
    public function render()
    {
        return view('livewire.components.sidebar.admin-sidebar.admin-sidebar');
    }
}
