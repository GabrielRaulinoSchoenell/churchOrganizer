@if(Auth::user()->company === $id )

    {{$church->name}}
    {{$church->local}}

@endif

@if($configChurch)
    <form>
        <input type='text' placeholder='Altere o nome da sua igreja'>
    </form>
@endif
