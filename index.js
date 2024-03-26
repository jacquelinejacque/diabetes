const form = document.getElementById('form');
const fullName = document.getElementById('fullName');
const email = document.getElementById('email');
const password = document.getElementById('password');
const check = document.getElementById('check');
const errorElement= document.getElementById('error');

form.addEventListener('submit', (e) =>{
    let messages=[];
    if (fullName.value==='' || fullName.value===null){
        messages.push('Name is required');
    }
    if(password.value.length<8){
        messages.push('password must not be less than 8 characters');
    }
    if(password.value.length>10){
        messages.push('password must not be more than 10 characters');
    }
    if(password.value==='password'){
        messages.push('password cannot be password');
    }
    if (password.value==='' || password.value===null){
        messages.push('Password is required');
    }
    if (email.value==='' || email.value===null){
        messages.push('Email is required');
    }
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        messages.push("Please enter a valid email address.");
    }

    if (!check.checked) {
        messages.push("Please agree to the terms before submitting.");
    }

    if(messages.length>0){
        e.preventDefault();
        errorElement.innerText= messages.join(',');
    }
    

    validateInputs();
} );