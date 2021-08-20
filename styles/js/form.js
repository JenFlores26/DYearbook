let addButton = document.querySelector('.add-btn');
let addMember = document.querySelector('.addMember');
let cancelButton = document.querySelector('.cancel-btn');

addButton.addEventListener('click', function(){
    addMember.classList.add('form-active');
});
cancelButton.addEventListener('click', function(){
    addMember.classList.remove('form-active');
});
