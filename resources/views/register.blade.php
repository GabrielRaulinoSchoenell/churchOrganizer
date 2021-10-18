<form method='POST'>
    @csrf
    <input type='text' name='name' placeholder='Insira um nome' value="{{old('name')}}">
    <input type='email' name='email' placeholder='Insira um Email' value="{{old('email')}}">
    <input type='password' name='password' placeholder='Insira uma senha'>
    <input type='password' name='password_confirmation' placeholder='Confirme sua senha'>
    <input type='submit' value='Registrar'>
</form>

@if($errors->any())
    @foreach($errors->all() as $error)

        {{$error}}

    @endforeach
@endif