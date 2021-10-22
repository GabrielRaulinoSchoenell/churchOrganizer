<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function confirm($email){
        return view('redefine', ['email' => $email]);
    }

    public function confirmAction(Request $request){
        $data = $request->only(['email', 'password', 'password_confirmation']);

       

        if($data['password'] === $data['password_confirmation']){

            $validator = $this->validator($data);

            if($validator->fails()){
                return redirect()->route('confirmation', ['email' => $data['email']])->withErrors($validator);
            }

            $update = User::where('email', $data['email'])->first();
            $update->password = Hash::make($data['password']);
            $update->save();

    

            return redirect()->route('login');

        } else{
            return view('redefine', [
                'email' => $data['email'],
                'warning' => 'As senhas devem ser correspondentes'
            ]);
        }
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
