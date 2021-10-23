
<section>
    <div class='profile'>
        <div class='profile-photo'>
            <div class='tasks-amount'>{{$user->tasks}}</div>
        </div>
    </div>
</section>

<form method='POST'>
    @csrf
    <input type='text' value='{{$user->email}}' disabled>
    <input type='text' value='{{$user->company}}' disabled>
    <input type='text' value='{{$user->name}}' placeholder="defina o nome de usuário" name='name'>
    <input type='text' value='{{$user->phone}}' placeholder="defina o número de usuário" name='phone'>
    <input type='text' value='{{$user->birthday}}' placeholder="defina o aniversário de usuário" name='birth'>
    <input type='submit'>
</form>

@if(session('warning'))

{{session('warning')}}

@endif