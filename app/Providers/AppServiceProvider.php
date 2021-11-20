<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Church;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['church.*', 'home'], function($view){
            $week = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
            $church = Church::find(Auth::user()->company);
            $churchCreator = User::find($church->creator_id);
            $churchMembers = count(User::where('company', Auth::user()->company)->get());

            $view->with([
                'week' => $week, 
                'church' => $church,
                'churchCreator' => $churchCreator,
                'churchMembers' => $churchMembers
            ]);
        });
    }
}
