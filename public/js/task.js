let modal = document.querySelector('.modal-task-make');
modal.style.display = 'none';

document.querySelector('button').addEventListener('click', ()=>{
    if(modal.style.display == 'none'){
        modal.style.display = 'flex';
    } else {
        modal.style.display = 'none';
    }
})