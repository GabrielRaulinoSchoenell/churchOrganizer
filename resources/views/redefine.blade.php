@extends('layouts.form')

@section('page-title', 'Redefinir senha')

@section('form')

    <form method='POST'>
        @csrf
        <input type='hidden' value='{{$email}}' name='email'>
        <input type='password' minlength="8" name='password' placeholder='Insira uma nova senha'>
        <input type='password' minlength="8" name='password_confirmation' placeholder='Confirme sua nova senha'>
        <label class='submits'>
            <input type='submit' value='Redefinir senha'>
        </label>
        
    </form>


@endsection

@if(isset($warning))
    @section('failures')
        {{$warning}}
    @endsection
@endif