<?php

namespace App\Livewire\Page\Blog;

use Livewire\Component;
use Illuminate\Http\Request;

class Blog extends Component
{
    public $title = 'Blog';
    public $mode;
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
    }
    
    public function render()
    {
        return view('livewire.page.blog.blog')
        ->layout('components.layouts.page',[
            'title'=>$this->title,
            'mode'=>$this->mode]);
    }
}
