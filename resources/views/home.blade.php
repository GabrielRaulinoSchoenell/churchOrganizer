@extends('layouts.app')

<head>
    <link href='{{asset("css/home.css")}}' rel='stylesheet'>
</head>

@section('logo', 'logo')

@section('user-info')
    <div class='user-info-name'>
        <a href='{{route("user")}}'>{{Auth::user()->name}}</a>
        <div>-</div>
        <a href='{{route("church", ["id" => $church->id])}}'>{{$church->name}}</a>
    </div>
    <div class='profile-photo'></div>
@endsection

{{-- 
<a href='{{route("user")}}'>{{Auth::user()->name}}</a>


suas ultimas tarefas: 
<br>
//<br> 
//<br>


@foreach($data as $item)
    <hr>
    <div>{{$item[0]}} no periodo da {{$item[1]}}</div>
    <div>{{$item[2]}}</div>
    <div>{{$item[3]}}</div> --}}
    {{-- HomeController criei uma array sem keys, porisso os numeros (day, period, function e notes) --}}
{{-- @endforeach


<br><br><br>


@if(!$configChurch)

    <a href='{{route("createChurch")}}'>Criar igreja</a>

@endif

<br>
@if($taskMaker)

    <a href='{{route("makeTasks")}}'>determinar as tarefas</a>

@endif

<br><br>

@if($configChurch)
    <a href='{{route("church", ["id" => Auth::user()->company])}}'>alterar configurações da igreja</a>
@endif

<br><br> --}}
