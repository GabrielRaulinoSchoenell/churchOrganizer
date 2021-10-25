<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Church;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ChurchController extends Controller
{
    public function index($id){
        $church = Church::find($id);

        return view('church', [
            'configChurch' => Gate::allows('config-church'),
            'id' => $id,
            'church' => $church
        ]);
    }

    public function create(){
        return view('createChurch');
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
}
