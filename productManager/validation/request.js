
const userNameError=document.getElementById('req1');
const userIdError=document.getElementById('req2');
const quantityError=document.getElementById('req2');
const descriptionError=document.getElementById('req1');
const submitError=document.getElementById('req5');
function validateDescription(){
    var description=document.getElementById('description').value;
    var required=40;
    var left=required-description.length;
    if(left>0){
        descriptionError.innerHTML=left+'more char is left';
        return false;
    }
    descriptionError.innerHTML='';
    return true;
}

function validateQuantity(){
    var quantity=document.getElementById('quantity').value;
    if(quantity=="" || quantity==null){
        quantityError.innerHTML='please insert quantity';
    }

        
            if (isNaN(quantity) && !quantity==0) {
                quantityError.innerHTML='only digit possible';
                return false;
            }
            quantityError.innerHTML='';
            return true;
        }

        function validateUserName(){
            var userName=document.getElementById('username').value;
            var reg = /^[a-zA-Z]+$/;
            if(userName.length==0){
                userNameError.innerHTML='user name is required';
                return false;
            }
            if(!userName.match(reg)){
                userNameError.innerHTML='user name only contians letter';   
                return false;
            }
            userNameError.innerHTML='<i class="fa-solid fa-check"></i>';
            return true;
        }
        function validateUserId(){
            var userid=document.getElementById('userid').value;
            if(userid.length==0){
                userIdError.innerHTML='please enter user id';
                return false;
            }
            if(!userid.length>=1){
                userIdError.innerHTML='user id length should be greater than zero';
        return false;
            }
            if(!userid.match(/^[0-9]+$/)){
                userIdError.innerHTML='only digit possible';
        return false;
            }
            userIdError.innerHTML='';
            return true;
        }

        function validateForm(){
            if( !validateDescription() || !validateQuantity() || !validateUserName()|| !validateUserId()){
                submitError.style.display='block';
                submitError.innerHTML='please fill the form correctly';
               setTimeout(function(){
                submitError.style.display='none';
            },3000)
                return false; 
            }
        }