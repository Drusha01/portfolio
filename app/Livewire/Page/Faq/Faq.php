<?php

namespace App\Livewire\Page\Faq;

use Livewire\Component;
use Illuminate\Http\Request;

class Faq extends Component
{
    public $title = 'Faq';
    public $mode;
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }
    public function render()
    {
        return view('livewire.page.faq.faq')
        ->layout('components.layouts.page',[
            'title'=>$this->title,
            'mode'=>$this->mode]);
    }
}
