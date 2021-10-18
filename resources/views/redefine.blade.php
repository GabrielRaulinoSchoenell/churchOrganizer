<form method='POST' action='{{action("MainController@confirmAction")}}'>
    @csrf
    <input type='hidden' value='{{$email}}' name='email'>
    <input type='password' minlength="8" name='password' placeholder='Insira uma nova senha'>
    <input type='password' minlength="8" name='password_confirmation' placeholder='Confirme sua nova senha'>
    <input type='submit' value='Redefinir senha'>
</form>

@if(isset($warning))
{{$warning}}

@endif