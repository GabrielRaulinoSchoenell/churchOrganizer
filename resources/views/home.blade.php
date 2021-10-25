@extends('layouts.app')


<a href='{{route("user")}}'>{{Auth::user()->name}}</a>


suas ultimas tarefas: 
<br>
//<br> 
//<br>


@foreach($data as $item)
    <hr>
    <div>{{$item[0]}} no periodo da {{$item[1]}}</div>
    <div>{{$item[2]}}</div>
    <div>{{$item[3]}}</div>
    {{-- HomeController criei uma array sem keys, porisso os numeros (day, period, function e notes) --}}
@endforeach


<br><br><br>


@if(!$configChurch)

    <a href='{{route("createChurch")}}'>Criar igreja</a>

@endif


@if($taskMaker)

    <a href='{{route("makeTasks")}}'>determinar as tarefas</a>

@endif

<br><br>

@if($configChurch)
    <a href='{{route("church", ["id" => Auth::user()->company])}}'>alterar configurações da igreja</a>
@endif

<br><br>
