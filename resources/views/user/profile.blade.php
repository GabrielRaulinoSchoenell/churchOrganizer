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
                @for($i=0;$i< 42; $i++)

                        @if($i >= $presentDay  && $i < $daysInMonth + $presentDay)
                    
                                <div class='calendar-day'>
                                    <div class='calenda-day-number'>{{$i - $presentDay + 1}}</div>
                                
                                    <input type='checkbox' name="{{($i - $presentDay +1)}}" value='{{date("Y/m/").($i - $presentDay +1)}}'>
                                </div>
                        @else

                            <div class='calendar-day'></div>
                        @endif


                @endfor
            </div>
        </div>
        <input type='submit' value='salvar'>
    </form>

</div>



<script src='{{asset("js/user.js")}}'></script>