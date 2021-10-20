@extends('layouts.app')


<a href='{{route("user")}}'>{{Auth::user()->name}}</a>


suas ultimas tarefas: 

//<br> 
//<br>

<br><br><br>

@if($taskMaker)

    <a href=''>determinar as tarefas</a>

@endif

<br><br>

@if($configChurch)
    <a href=''>alterar configurações da igreja</a>
@endif

<br><br>
