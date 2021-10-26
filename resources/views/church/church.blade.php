igreja


@if(Auth::user()->company === $id )

    {{$church->name}}
    {{$church->local}}



@if($configChurch)
    <form method='POST'>
        @csrf
        <input type='text' placeholder='Altere o nome da sua igreja' name='name'>
        <input type='text' placeholder='Altere o local da sua igreja' name='local'>
        <input type='submit'>
    </form>


    <a href='{{route("configDays", ["id" => Auth::user()->company])}}'>defina os dias que a igreja tem culto: </a><br>

    @foreach($days as $day)
    {{$week[$day->day]}}
    {{$periods[$day->period]}}<br><br>
    @endforeach


@endif
@endif