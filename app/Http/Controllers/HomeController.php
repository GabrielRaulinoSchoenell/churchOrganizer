<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\plan;
use App\Models\User;
use App\Models\Church;
use App\Models\Day_definition;

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

        $church = Church::find(Auth::user()->company);
        $churchCreator = User::find($church->creator_id);
        $churchMembers = count(User::where('company', Auth::user()->company)->get());
        $churchDays = Day_definition::where('church_id', Auth::user()->company)->get();

        $days = plan::where('user_id', $id)->get();
        
        $update = User::find($id);
        $update->tasks = count($days);
        $update->save();

        $periods = ['manhã', 'tarde', 'noite'];
        $colors = ['#acf', '#fc8', '#726'];


        return view('home', [
            'taskMaker' => Gate::allows('task-maker'),
            'configChurch' => Gate::allows('config-church'),
            'days' => $days,
            'church' => $church,
            'periods' => $periods,
            'colors' => $colors,
            'churchCreator' => $churchCreator,
            'churchMembers' => $churchMembers,
            'churchDays' => $churchDays
        ]);
    }

}
