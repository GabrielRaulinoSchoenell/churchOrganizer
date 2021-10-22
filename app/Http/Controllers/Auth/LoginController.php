<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function index(){
        return view('login');
    }

    

    public function handleLogin(Request $request){
        $data = $request->only(['email', 'password']);
        $forgot = $request->input('forgot');
        $email = $data['email'];

        if(User::where('email', $data['email'])->first() == null){
            return redirect()->route('login')->with('warning', 'Email não pertence a um usuário');
        } 

        if($forgot && $data['email']){
            Mail::send('confirmEmail', ["email" => $email], function($message) use($email){
                $message->from(env('MAIL_USERNAME', 'gabrielraulinoschoenell@gmail.com'), 'Gabriel Raulino');
                $message->subject('redefinir senha');
                $message->to($email);
            });

            return view('waiting');
        }        
        $remember = $request->input('remember');

        if(Auth::attempt($data, $remember)){
            return redirect()->route('home');
        }
        
        return redirect()->route('login')->with('warning', 'Login e/ou senha inválidos')->withInput();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }





    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
