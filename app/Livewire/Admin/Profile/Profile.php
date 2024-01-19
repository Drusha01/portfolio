<?php

namespace App\Livewire\Admin\Profile;

use Livewire\Component;
use Illuminate\Http\Request;

class Profile extends Component
{
    public $title = 'About';

    public $mode;

    public function boot(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];

        if(!isset($data['user_id'])){
            header("Location: /login");
            die();
        }else{
            $user_status = DB::table('users as u')
            ->select('u.user_status_id','us.user_status_details')
            ->join('user_status as us', 'u.user_status_id', '=', 'us.user_status_id')
            ->where('user_id','=', $data['user_id'])
            ->first();
        }

        if(isset($user_status->user_status_details) && $user_status->user_status_details == 'deleted' ){
            header("Location: /deleted");
            die();
        }

        if(isset($user_status->user_status_details) && $user_status->user_status_details == 'inactive' ){
            header("Location: /deleted");
            die();
        }
    }

    public function update_data(){
        
    }
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        $this->user_id =  $data['user_id']; 

        self::update_data();
    }
    public function render()
    {
        return view('livewire.admin.profile.profile')   
        ->layout('components.layouts.admin',[
        'title'=>$this->title]);
    }
}
