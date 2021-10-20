oi {{Auth::user()->name}}

{{$userStatus}}


<br><br><br>


<button>selecionar dias disponiveis</button>

<div class='select-days-modal'>
    {{date('m')}}
    {{cal_days_in_month(CAL_GREGORIAN, 1, 2021)}}

    <form method='POST' class='calendar'>
        @csrf

        <input type='submit' value='salvar'>
    </form>

</div>

<script src='{{asset("js/user.js")}}'></script>