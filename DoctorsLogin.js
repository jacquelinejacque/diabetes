const form=document.getElementById('form');
const fullName=document.getElementById('fullName');
const password=document.getElementById('password');
const check=document.getElementById('check');
const age = document.getElementById('age');
const Female = document.getElementById('Female');
const weight = document.getElementById('weight');
const errorElement=document.getElementById('error');

form.addEventListener('submit', (e) =>{
    let messages= [];

    if (fullName.value===''|| fullName.value===null){
        messages.push('Name is required');
    }
    if(password.value==='password'){
        messages.push('password cannot be password');
    }
    if (weight.value==='' || weight.value===null){
        messages.push('weight is required');
    } 
    if (!emailPattern.test(email)) {
        messages.push("Please enter a valid email address.");
    }           
    if (password.value.length<8){
        messages.push('Password should not be less than 8 characters');
    }
    if (password.value.length>10){
        messages.push('Password should not be more than 10 characters');
    }
    if(password.value==='password'){
        messages.push('password cannot be password');
    }    
    if (age.value==='' || age.value===null){
        messages.push('Age is required');
    }
    if (Female.value==='' || Female.value===null){
        messages.push('gender is required');
    }
    if (weight.value==='' || weight.value===null){
        messages.push('weight is required');
    } 
    if (!check.checked) {
        messages.push("Please agree to the terms before submitting.");
    }

    if ((messages.length>0)){
        e.preventDefault();
        errorElement.innerText = messages.join(',');
    }
    validateInputs();
});