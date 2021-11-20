@extends('layouts.profile')
<head>
    <link href='{{asset("css/profile.css")}}' rel='stylesheet'>
</head>

@section('page-title', $church->name)

@section('logo')
    <div class='church-photo' style='background-image:@if($church->photo){{$church->photo}} @else url({{asset("img/pattern.png")}}) @endif'></div>  
    <div class='church-content'>{{$church->name}}</div>
    <div class='church-info'>{{$church->local}} - {{$churchCreator->name}}</div>
@endsection

@section('content')
    @if(Auth::user()->company === $id )
        <div class='content-main'>
            @if($configChurch)
   
            <form method='POST'>
                @method('PUT')
                @csrf
                <label>
                    Nome da igreja:
                    <input type='text' value='{{$church->name}}' name='name'>
                </label>
                <label>
                    Local da igreja (CEP)
                    <input type='text' value='{{$church->local}}' name='local'>
                </label>
                <label>
                    <input type='submit'>
                </label>
            </form>

            <div class='church-config'>
                <a href='{{route("configDays", ["id" => Auth::user()->company])}}' class='define-days'>defina os dias que a igreja tem culto: </a><br>

                @foreach($days as $day)
                <div class='days'>
                    <div class='week-day'>{{$week[$day->day]}}</div>
                    <div class='day-period'>{{$periods[$day->period]}}</div>
                </div>
                @endforeach
            </div>
            @endif            
        </div>
    @else
        <div class='content-main'>Você não é um administrador</div>
    @endif
@endsection

@if(isset($warning))
        <div class='warning'>{{$warning}}</div>
@endif




