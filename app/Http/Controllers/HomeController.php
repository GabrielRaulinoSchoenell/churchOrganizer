<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\plan;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $id = Auth::user()->id;

        $days = plan::where('user_id', $id)->get();
        $data = [];

        foreach($days as $item){
            if($item->day > date('Y-m-d')){
                array_push($data, [$item->day, $item->period,$item->function, $item->notes]);
            } 
        }
        
        $update = User::find($id);
        $update->tasks = count($data);
        $update->save();

        return view('home', [
            'taskMaker' => Gate::allows('task-maker'),
            'configChurch' => Gate::allows('config-church'),
            'days' => $days,
            'data' => $data
        ]);
    }

}
