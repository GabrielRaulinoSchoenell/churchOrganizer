oi {{Auth::user()->name}}

{{$userStatus}}


<br><br><br>


<button>selecionar dias disponiveis</button>

<div class='select-days-modal'>
    {{date('M')}}

    <form method='POST'>
        @csrf
        <input name='0' type='checkbox' value='2021/02/02 '>
        <input name='1' type='checkbox' value='2021/02/03'>

        <input type='submit' value='salvar'>
    </form>

</div>