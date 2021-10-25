<head>
    <link href='{{asset("css/task.css")}}' rel='stylesheet'>
</head>


<div>
    // calendario (arrasta e solta)
</div>

//pessoas 


@foreach($data as $user)
    <br>
    {{$user->name}}
    {{$user->id}}
    {{$user->tasks}}
@endforeach

<br>
<button>action que acontecerá ao dar o drop</button>

<div class='modal-task-make'>
    <form method='POST' class='modal-content' action='{{route("taskInfo")}}'>  
        @csrf
        {{-- os inputs a seguir serão trocados por hidden e automaticamente entrarão na informação ao dar o drop --}}
        <input type='text' placeholder="// id da pessoa" name='id'>
        <input type='text' placeholder='// data da task' name='day'>
    
    
    
        <input type='text' list='list' name='period'>
        <datalist id='list'>
            <option value='0'>// Manhã</option>
            <option value='1'>// Tarde</option>
        </datalist>
        <input type='text' placeholder='Insira o título da tarefa' name='title'>
        <input type='text' placeholder='Insira a descrição da tarefa' name='desc'>
        <input type='submit'>
    </form>
    
</div>

<script src='{{asset("js/task.js")}}'></script>