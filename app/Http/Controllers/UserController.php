<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Allowed_day;
use App\Models\User;
use App\Models\plan;
use App\Models\Day_definition;

class UserController extends Controller
{

    protected $userStatus = 'usuário comum';

    protected $levels = ['usuário comum', 'admin', 'master'];

    protected $months = ['janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro']; // getting portuguese names
    
    protected $week = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];

    public function __construct(){

    }

    public function defineStatus(){ // for some reason i couldn't put this method into __construct 
        $levels = $this->levels;
        $userLevel = Auth::user()->level; // will return (0, 1, 2) 
        $levels[$userLevel];
        return $levels[$userLevel];
    }

    public function index(){
        $this->userStatus = $this->defineStatus();
        $allowed_days = Day_definition::where('church_id', Auth::user()->company)->get();

        return view('user.profile', [
            'userStatus' => $this->userStatus,
            'months' => $this->months,
            'week' => $this->week,
            'allowed_days' => $allowed_days
        ]);
    }


    public function update(){   
        $user = Auth::user();

        return view('user.update', ['user'=>$user]);
    }

    public function updateAction(Request $request){
        $data = $request->only(['name', 'birth', 'phone']);

        $update = User::find(Auth::user()->id);
        $update->name = $data['name'];
        $update->birthday = $data['birth'];
        $update->phone = $data['phone'];
        $update->save();

        return redirect()->route('updateProfile')->with('warning', 'Perfil atualizado com sucesso!');
    }

    public function days(Request $request){

        $monthdays = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));

        for($i = 0; $i < $monthdays; $i++){
            if($request->input($i)){
                $insert = new Allowed_day();
                $insert->user_id = Auth::user()->id;
                $insert->day = $request->input($i);
                $insert->save();
            }
        }

    }
     
    public function tasks(){
        $data = User::where('company', Auth::user()->company)->get();
        $plan = plan::all();

         return view('makeTasks', [
             'data' => $data,
             'plan' => $plan
         ]);   
    }

    public function setTasks(){
        echo 'oi';
    }

    public function setTaskInfo(Request $request){
        $data = $request->only(['id', 'day', 'period', 'title', 'desc']);


        $insert = new plan();
        $insert->user_id = $data['id'];
        $insert->day = $data['day'];
        $insert->period = $data['period'];
        $insert->function = $data['title'];
        $insert->notes = $data['desc'];
        $insert->save();
 
        $user = User::find($data['id']);
        $user->tasks ++;
        $user->save();

    }

}
