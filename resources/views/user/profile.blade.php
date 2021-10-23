<head>
    <link href='{{asset("css/user.css")}}' rel='stylesheet'>
</head>

oi {{Auth::user()->name}} <br>


<a href='{{route("updateProfile")}}'>alterar perfil</a>

{{$userStatus}}


<br><br><br>


<button>selecionar dias disponiveis</button>

<div class='select-days-modal'>
    {{$month}}
    {{cal_days_in_month(CAL_GREGORIAN, 1, 2021)}}

    <form method='POST' class='calendar'>
        @csrf
        <table class='days'>
            
        </table>
        <input type='submit' value='salvar'>
    </form>

</div>

<script src='{{asset("js/user.js")}}'></script>