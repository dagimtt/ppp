const returnItemIdError=document.getElementById('ret1');
const quantityError=document.getElementById('ret2');
const userNameError=document.getElementById('ret3');
const userIdError=document.getElementById('ret4');
const submitError=document.getElementById('ret5');
function validateReturnItemId(){
    var returnitemid=document.getElementById('returnitemid').value;
    if(returnitemid.length==0){
        returnItemIdError.innerHTML='please enter item id';
        return false;
    }
    if(!returnitemid.length>=1){
        returnItemIdError.innerHTML='item id length should be greater than zero';
return false;
    }
    if(!returnitemid.match(/^[0-9]+$/)){
        returnItemIdError.innerHTML='only digit possible';
return false;
    }
    returnItemIdError.innerHTML='';
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
                receiverIdError.innerHTML='please enter user id';
                return false;
            }
            if(!userid.length>=1){
                receiverIdError.innerHTML='user id length should be greater than zero';
        return false;
            }
            if(!userid.match(/^[0-9]+$/)){
                receiverIdError.innerHTML='only digit possible';
        return false;
            }
            receiverIdError.innerHTML='';
            return true;
        }

        function validateForm(){
            if( !validateReturnItemId() || !validateQuantity() || !validateUserName()|| !validateUserId()){
                submitError.style.display='block';
                submitError.innerHTML='please fill the form correctly';
               setTimeout(function(){
                submitError.style.display='none';
            },3000)
                return false; 
            }
        }