@extends('layouts.form')

@section('page-title', 'Registrar')

@section('form')
    <form method='POST'>
        @csrf

        <input type='select' name='church' list='church' autocomplete='off' placeholder='Selecione a igreja' name='church'> 

        <datalist id='church' >
            @foreach($churches as $church)
                <option value="{{$church->id}}">{{$church->name}}</option>
            @endforeach
        </datalist>

        <input type='text' name='name' placeholder='Insira um nome' value="{{old('name')}}">
        <input type='email' name='email' placeholder='Insira um Email' value="{{old('email')}}">
        <input type='password' name='password' placeholder='Insira uma senha'>
        <input type='password' name='password_confirmation' placeholder='Confirme sua senha'>
        <label class='submits'>
            <input type='submit' value='Registrar'>
            <a href='{{route("login")}}'>Fazer Login</a>   
        </label>
        
    </form>
 


    @if($errors->any())
    @foreach($errors->all() as $error)

        {{$error}}

    @endforeach
    @endif

@endsection

@section('footer', 'Todos os direitos reservados')
