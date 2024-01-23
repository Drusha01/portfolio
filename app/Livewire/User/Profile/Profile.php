<?php

namespace App\Livewire\User\Profile;

use Livewire\Component;

class Profile extends Component
{

    public function get_table_info($table_name){
        return (DB::table('tables')
        ->where('table_name','=',$table_name)
        ->where('user_id','=',$this->user_id)
        ->first());
    }
    public function render()
    {
        return view('livewire.user.profile.profile');
    }
}
