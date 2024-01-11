<?php

namespace App\Livewire\Components\Footer\PageFooter;

use Livewire\Component;
use Illuminate\Http\Request;

class PageFooter extends Component
{
    public $mode;
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }

    public function render()
    {
        return view('livewire.components.footer.page-footer.page-footer');
    }
}
