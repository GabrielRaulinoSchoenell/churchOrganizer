let calendar = document.querySelector('.calendar');
let month = new Date().getMonth();
let year = (new Date().getFullYear()).toString();

function getMonthDays(){
    let day = 0;
    year.slice(2,4);
    for(let i = 2; i < 33; i++){
        day = new Date(year ,month, i).getDate();
        if(day === 1){
            return i;
        } 
    }
}
let monthDays = getMonthDays();
let input;
for(let i=1; i<monthDays; i++){
    input = document.createElement('input');
    input.setAttribute('name', i);
    input.setAttribute('type', 'checkbox');
    input.setAttribute('value', year+"/"+month+"/"+i); // for some reason `` is not working 

    calendar.appendChild(input);


    console.log(input);
}