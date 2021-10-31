@extends('layouts.form')

@section('page-title', 'Login')


@section('form')

    <form method='POST'>
        @csrf
        <input type='email' name='email' placeholder='Digite seu Email' value="{{old('email')}}" >
        <input type='password' name='password' placeholder='Digite sua senha'>
        <label class='remember'>
            <input type='checkbox' name='remember' value='on'> 
            lembrar de mim
        </label>
        <label class='submits'>
            <input type='submit' id='submit-action' value='Entrar'>
            <input type='submit' name='forgot' value='Esqueci a senha'>
            <a href='register'>Criar conta</a> 
        </label>
        
    </form>


   
@endsection

@if(session('warning'))

{{session('warning')}}

@endif

@section('footer', 'Todos os direitos reservados')

