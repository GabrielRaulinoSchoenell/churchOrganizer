@if(Auth::user()->company === $id )

    {{$church->name}}
    {{$church->local}}



@if($configChurch)
    <form method='POST'>
        @csrf
        @for($i=0; $i<=6; $i++)
            <input type='checkbox' value='{{$i}}' name='{{$i}}'>
        @endfor
        <input type='submit' value='enviar'>
    </form>

    
    
@endif
@endif