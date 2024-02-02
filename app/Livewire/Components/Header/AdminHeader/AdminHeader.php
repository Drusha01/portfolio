<?php

namespace App\Livewire\Components\Header\AdminHeader;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AdminHeader extends Component
{
    public $mode;

    public $fullname;

    public function boot(Request $request){
        $data = $request->session()->all();
        $this->mode = $data['mode'];
        $this->user_id = $data['user_id'];
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
        $user_details =  DB::table('users as u')
            ->select(DB::raw('CONCAT(user_firstname," ",user_middlename," ",user_lastname) as fullname'),
            'user_id',
            'u.user_status_id' ,
            'u.user_sex_id' ,
            'u.user_gender_id',
            'u.user_role_id' ,
            'user_name' ,
            'user_email' ,
            'user_phone' ,
            'user_name_verified',
            'user_email_verified',
            'user_phone_verified',
            'user_firstname' ,
            'user_middlename',
            'user_lastname',
            'user_suffix',

            'user_addr_street' ,
            'user_addr_brgy' ,
            'user_addr_city_mun' ,
            'user_addr_province' ,
            'user_addr_zip_code' ,
            

            'user_birthdate' ,
            'user_profile_picture' ,
            'user_formal_id' ,

            'u.date_created' ,
            'u.date_updated',

            'user_gender_details' ,
            )
            ->join('user_status as us', 'u.user_status_id', '=', 'us.user_status_id')
            ->join('user_sex as usex', 'u.user_sex_id', '=', 'usex.user_sex_id')
            ->join('user_genders as ug', 'u.user_gender_id', '=', 'ug.user_gender_id')
            ->join('user_roles as ur', 'u.user_role_id', '=', 'ur.user_role_id')
            ->where('user_id','=', $this->user_id)
            ->first();
        $this->user_details = [
            'user_id' =>$user_details->user_id,
            'user_status_id' => $user_details->user_status_id,
            'user_sex_id' =>$user_details->user_sex_id,
            'user_gender_id' =>$user_details->user_gender_id,
            'user_role_id' =>$user_details->user_role_id,
            'user_name' =>$user_details->user_name,
            'user_email' =>$user_details->user_email,
            'user_phone' =>$user_details->user_phone,
            'user_name_verified' =>$user_details->user_name_verified,
            'user_email_verified' =>$user_details->user_email_verified,
            'user_phone_verified' =>$user_details->user_phone_verified,
            'user_firstname' =>$user_details->user_firstname,
            'user_middlename' =>$user_details->user_middlename,
            'user_lastname' =>$user_details->user_lastname,
            'user_suffix' =>$user_details->user_suffix,

            'user_addr_street' =>$user_details->user_addr_street,
            'user_addr_brgy' =>$user_details->user_addr_brgy,
            'user_addr_city_mun' =>$user_details->user_addr_city_mun,
            'user_addr_province' =>$user_details->user_addr_province,
            'user_addr_zip_code' =>$user_details->user_addr_zip_code,
            

            'user_birthdate' =>$user_details->user_birthdate,
            'user_profile_picture' =>$user_details->user_profile_picture,
            'user_formal_id' =>$user_details->user_formal_id,

            'date_created' =>$user_details->date_created,
            'date_updated' =>$user_details->date_updated,

            'user_gender_details' =>$user_details->user_gender_details,
            'user_address' => $user_details->user_addr_street.', '.$user_details->user_addr_brgy.', '.$user_details->user_addr_city_mun.', '.$user_details->user_addr_province.', '.$user_details->user_addr_zip_code
        ];
    }
    public function mount(Request $request){
        $data = $request->session()->all();
        $this->fullname = DB::table('users as u')
            ->select(DB::raw('CONCAT(user_firstname," ",user_middlename," ",user_lastname) as fullname'))
            ->where('user_id','=',$data['user_id'])
            ->first()->fullname;
        $this->mode = $data['mode'];
        

        self::update_data();
   
    }
    public function render()
    {
        return view('livewire.components.header.admin-header.admin-header',['user_details'=>$this->user_details]);
    }
    public function mode_toggle(Request $request){
        $request->session()->put('mode', !$this->mode);
        $this->dispatch('refresh-page');
        self::update_data();
    }
}
