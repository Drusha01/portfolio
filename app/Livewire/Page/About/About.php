<?php

namespace App\Livewire\Page\About;

use Livewire\Component;
use Illuminate\Http\Request;

class About extends Component
{
    public $title = 'About';

    public $mode;
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }
    public function render()
    {
        return view('livewire.page.about.about')
            ->layout('components.layouts.page',[
                'title'=>$this->title,
                'mode'=>$this->mode]);
    }
}
