<?php

namespace App\Livewire\Components\Header\PageHeader;

use Livewire\Component;
use Illuminate\Http\Request;

class PageHeader extends Component
{
    public $mode;
    public function booted(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }

    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }
    public function render()
    {
        return view('livewire.components.header.page-header.page-header');
    }

    public function mode_toggle(Request $request){
        $request->session()->put('mode', !$this->mode);
        $this->dispatch('refresh-page');
    
    }
}
