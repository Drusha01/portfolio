<?php

namespace App\Livewire\Page\TechStack;

use Livewire\Component;
use Illuminate\Http\Request;

class TechStack extends Component
{
    public $title = 'TechStack';
    public $mode;
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }
    public function render()
    {
        return view('livewire.page.tech-stack.tech-stack')
        ->layout('components.layouts.page',[
            'title'=>$this->title,
            'mode'=>$this->mode]);
    }
}
