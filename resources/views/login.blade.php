@extends('layouts.form')

<form method='POST'>
    @csrf
    <input type=select name='church'> 


    <input type='email' name='email' placeholder='Digite seu Email' value="{{old('email')}}" >
    <input type='password' name='password' placeholder='Digite sua senha'>
    <input type='submit' value='Entrar'>
    <input type='checkbox' name='remember' value='on'>
    <input type='submit' name='forgot' value='Esqueci a senha'>
</form>



<a href='register'>Criar conta</a> 

@if(session('warning'))

    {{session('warning')}}

@endif