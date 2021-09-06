let addButton = document.querySelector('.add-btn');
let addMember = document.querySelector('.addMember');
let cancelButton = document.querySelector('.cancel-btn');

addButton.addEventListener('click', function(){
    addMember.classList.add('form-active');
});
cancelButton.addEventListener('click', function(){
    addMember.classList.remove('form-active');
});

let addButtonRegA = document.querySelector('.add-btn-reg-a');
let addMemberRegA = document.querySelector('.addMember-reg-a');
let cancelButtonRegA = document.querySelector('.cancel-btn-reg-a');

addButtonRegA.addEventListener('click', function(){
    addMemberRegA.classList.add('form-active');
});
cancelButtonRegA.addEventListener('click', function(){
    addMemberRegA.classList.remove('form-active');
});
