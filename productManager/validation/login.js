const emailError=document.getElementById('spann');
const passwordError=document.getElementById('spann2');
const subError=document.getElementById('spann3');

function validEmail(){
    var email=document.getElementById('email').value;
        if(email.length==0){
            emailError.innerHTML='please enter email';
            return false;
        }
        if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
            emailError.innerHTML='invalid';
            return false;
        }
        emailError.innerHTML='';
        return true;
    }
    function validPassword(){
var password=document.getElementById('password').value;
if(password.length==0){
    passwordError.innerHTML='please enter password';
    return false;
}
if(password.length<6){
    passwordError.innerHTML='password length must be greater than  six'
    return false;
}
if(password.length>10){
    passwordError.innerHTML='password must be less than ten';
    return false;
}
passwordError.innerHTML='';
return true;
    }
    function validateForm(){
        if(!validEmail()|| !validPassword() ){
            subError.style.display='block';
            subError.innerHTML=' fill form ';
           setTimeout(function(){subError.style.display='none';},3000)
            return false; 
        }
    }