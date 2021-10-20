<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Allowed_day;

class UserController extends Controller
{

    public $userStatus = 'usuário comum';

    public function __construct(){
    }

    public function defineStatus(){ // for some reason i couldn't put this method into __construct 
        $levels = ['usuário comum', 'admin', 'master'];
        $userLevel = Auth::user()->level; // will return (0, 1, 2) 
        $levels[$userLevel];
        return $levels[$userLevel];
    }

    public function index(){
        $this->userStatus = $this->defineStatus();

        return view('user.profile', ['userStatus' => $this->userStatus]);
    }
    public function days(Request $request){

        $monthdays = 30;

        for($i = 0; $i < $monthdays; $i++){
            if($request->input($i)){
                $insert = new Allowed_day();
                $insert->user_id = Auth::user()->id;
                $insert->day = $request->input($i);
                $insert->save();
            }
        }

        
        




    }
}
