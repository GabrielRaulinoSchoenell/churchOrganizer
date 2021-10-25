<form method='POST'>
    @csrf
    <input type='text' name='name' placeholder='Defina o nome da igreja'>
    <input type='text' name='local' placeholder='Defina o CEP da sua igreja'>
    <input type='submit'>
</form>

@if(session('warning'))
    {{session('warning')}}
@endif