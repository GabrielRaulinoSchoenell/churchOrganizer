<head>
    <link href='{{asset("css/user.css")}}' rel='stylesheet'>
</head>

oi {{Auth::user()->name}} <br>


<a href='{{route("updateProfile")}}'>alterar perfil</a>

{{$userStatus}}


<br><br><br>


<button>selecionar dias disponiveis</button>

<div class='select-days-modal'>
    {{-- {{cal_days_in_month(CAL_GREGORIAN, 1, 2021)}} --}}


    <form method='POST' class='calendar'>
        @csrf
        <div class='calendar'>
            <div class='days'>    
                @foreach($week as $key => $day)
                    <div class='calendar-week-day calendar-day'> {{$day}}</div>
                @endforeach
            </div>
            <div class='days'>
                @for($i=0;$i< cal_days_in_month(CAL_GREGORIAN, date('m'), 2021); $i++)

                    


                    <div class='calendar-day'>{{$i}}</div>

                @endfor
            </div>



            





        </div>
        <input type='submit' value='salvar'>
    </form>

</div>

<script src='{{asset("js/user.js")}}'></script>