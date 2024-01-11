<?php

namespace App\Livewire\Page\Home;

use Livewire\Component;
use Illuminate\Http\Request;

class Home extends Component
{
    public $title = 'Home';
    public $mode;
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }
    public function render()
    {
        return view('livewire.page.home.home')
        ->layout('components.layouts.homepage',[
            'title'=>$this->title,
            'mode'=>$this->mode]);
    }
}
