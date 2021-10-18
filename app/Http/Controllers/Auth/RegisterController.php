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
        return view('register');
    }

    public function register(Request $request){
        $data = $request->only(['name', 'email', 'password', 'password_confirmation']);
        
        $validator = $this->validator($data);

        if($validator->fails()){
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        
        Mail::send('confirmRegistration', [
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => $data['name']
        ],             
            function($message) use ($data){
                $message->from(env('MAIL_USERNAME', 'gabrielraulinoschoenell@gmail.com'));
                $message->subject('Confirme o registro de seu Email');
                $message->to($data['email']);
        });

        return view('waiting');

    }

    public function registration(Request $request){
        $data = $request->only('email', 'password', 'name');

        $email_verified_at = date('Y/m/d');

        array_push($data, ["verified_at" => $email_verified_at]);

        $this->create($data);
        
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
    protected function create(array $data)
    {
            return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'email_verified_at' => $data['verified_at']
        ]);
    }
}
