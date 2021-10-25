<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Church;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        $churches = Church::all();

        return view('register', ['churches' => $churches]);
    }

    public function register(Request $request){
        $data = $request->only(['name', 'church', 'email', 'password', 'password_confirmation']);
        
        $validator = $this->validator($data);

        if($validator->fails()){
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        
        Mail::send('confirmRegistration', [
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'church' => $data['church']
        ],             
            function($message) use ($data){
                $message->from(env('MAIL_USERNAME', 'gabrielraulinoschoenell@gmail.com'));
                $message->subject('Confirme o registro de seu Email');
                $message->to($data['email']);
        });

        return view('waiting');

    }

    public function registration(Request $request){
        $data = $request->only('email', 'password', 'name', 'church');

        $create = new User();
        $create->name = $data['name'];
        $create->email =$data['email'];
        $create->password = $data['password'];
        $create->company = $data['church'];
        $create->email_verified_at = date('Y/m/d H:i:s');
        $create->save();
        
        return redirect()->route('home');
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    
}
