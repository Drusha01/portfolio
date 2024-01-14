<?php

namespace App\Livewire\Components\Header\AdminHeader;

use Livewire\Component;
use Illuminate\Http\Request;

class AdminHeader extends Component
{
    public $mode;
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }
    public function render()
    {
        return view('livewire.components.header.admin-header.admin-header');
    }
    public function mode_toggle(Request $request){
        $request->session()->put('mode', !$this->mode);
        $this->dispatch('refresh-page');
    
    }
}
