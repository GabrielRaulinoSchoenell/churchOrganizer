@extends('layouts.app')

<head>
    <link href='{{asset("css/header.css")}}' rel='stylesheet'>
    <link href='{{asset("css/home.css")}}' rel='stylesheet'>
</head>

@section('logo', 'logo')

@section('user-info')
    <nav class='options'>

        <a @if(!$configChurch) href='{{route("createChurch")}}' class='active' style='color: var(--font-color)' 
            @else  style='color: var(--fontcolor-unactive)' onclick='warning()' @endif>Criar igreja</a>

        <a @if($configChurch)href='{{route("church", ["id" => Auth::user()->company])}}'class='active' style='color: var(--font-color)' 
            @else style='color: var(--fontcolor-unactive)'@endif >Configurações da igreja</a>

        <a @if($taskMaker) href='{{route("makeTasks")}}' class='active' style='color: var(--font-color)' 
            @else style='color: var(--fontcolor-unactive)'@endif>Determinar as tarefas</a>

    </nav>

    <div class='user-info-name'>
        <a href='{{route("user")}}'>{{Auth::user()->name}}</a>
        <div>-</div>
        <a href='{{route("church", ["id" => $church->id])}}'>{{$church->name}}</a>
    </div>
    
    <a class='profile-photo' href='{{route("user")}}'></a>

    <a id='logout' href='{{route("logout")}}'>sair</a>
@endsection

@section('aside')    
    <a href='{{route("church", ["id" => Auth::user()->company])}}' class='church-image'>Igreja {{$church->name}}</a>

    <div class='church-info'>
        <div class='church-content'>Nome: {{$church->name}}</div>
        <div class='church-content'>Pastor: {{$churchCreator->name}}</div>
        <div class='church-content'>Local: {{$church->local}}</div>
        <div class='church-content'>Membros: {{$churchMembers}}</div>

        <table class='church-content'>
            <thead>
                <th>Dia de culto</th>
                <th>Turno</th>
            </thead>
            @foreach($churchDays as $day)
                <tr>
                    <td>{{$week[$day->day]}}</td>
                    <td>{{$periods[$day->period]}}</td>
                </tr>
            @endforeach            
        </table>
    </div>

@endsection


@section('content')
    <div class='content-title'>
        <h1>Suas Tarefas:</h1>
    </div>

    @if(count($days) > 0)
        @foreach($days as $item)
            @if($item->day > date('Y-m-d'))


        <div class='user-tasks' style='box-shadow: 12px 0px 1px {{$colors[$item->period]}}'>
            <div class='task-title'>
                <h1>{{$item->function}}</h1>
                <div class='date'>{{$item->day}}</div>
            </div>
            <div class='task-desc'>
                {{$item->notes}}
            </div>
            <div>
                no período da <strong>{{$periods[$item->period]}}</strong>
            </div>
        </div>
            @endif
        @endforeach
    @else
        <div class='unactive'>não há tarefas no momento</div>
    @endif

@endsection