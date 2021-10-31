<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Church;
use App\Models\Day_definition;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ChurchController extends Controller
{

    private $periods =['manhã', 'tarde', 'noite'];

    private $week = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];


    public function index($id){
        $church = Church::find($id);
        $days = Day_definition::where('church_id', $church->id)->get();


        return view('church.church', [
            'configChurch' => Gate::allows('config-church'),
            'id' => $id,
            'church' => $church,
            'days' => $days,
            'periods' => $this->periods,
            'week' => $this->week
        ]);
    }

    public function create(){
        return view('church.createChurch');
    }

    public function createAction(Request $request){
        $data = $request->only(['name', 'local']);

        if(!Church::where('creator_id', Auth::user()->id)->first()){
            $create = new Church();
            $create->name =$data['name'];
            $create->creator_id = Auth::user()->id;
            $create->local =$data['local'];
            $create->save();

            $update = User::find(Auth::user()->id);
            $update->level = 2;
            $update->company = $create->id;
            $update->save();

            return redirect()->route('home');
        } else{
            return redirect()->route('createChurch')->with('warning', 'Você já possui uma igreja');
        }
    }

    public function changeChurchInfo($id, Request $request){
        
        $data = $request->only(['name', 'local']);

        $update = Church::where('church_id', Auth::user()->company);
        $update->name = $data['name'];
        $update->local = $data['local']; 
        
        return redirect()->route('church', ['id' => Auth::user()->company]);
    }

    public function churchConfig($id){ 
        $church = Church::find($id);

        return view('church.config', [
            'configChurch' => Gate::allows('config-church'),
            'id' => $id,
            'church' => $church
        ]);
    }

    public function churchConfigAction($id, Request $request){
        $data = $request->only(['0','1','2','3','4','5','6']);
        

        for($i=0;$i<7;$i++){
            $delete = Day_definition::where('day', $i);
            $delete->delete();
        }      
        foreach($data as $item){
            $insert = new Day_definition();
            $insert->church_id = Auth::user()->company;
            $insert->day = $item;
            $insert->period = 0;
            $insert->save();
        }

        return redirect()->route('church', ['id' => $id]);
    }
}
