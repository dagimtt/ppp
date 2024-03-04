const senderNameError=document.getElementById('tra1');
const itemIdError=document.getElementById('tra2');
const itemNameError=document.getElementById('tra3');
const itemQuantityError=document.getElementById('tra4');
const receiverIdError=document.getElementById('tra5');
const receiverNameError=document.getElementById('tra6');
const remarkError=document.getElementById('tra7');
const submitError=document.getElementById('tra8');
function validateSenderName(){
    var senderName=document.getElementById('sendername').value;
    var reg = /^[a-zA-Z]+$/;
    if(senderName.length==0){
        senderNameError.innerHTML='sender name is required';
        return false;
    }
    if(!senderName.match(reg)){
        senderNameError.innerHTML='sender name only contians letter';   
        return false;
    }
    senderNameError.innerHTML='<i class="fa-solid fa-check"></i>';
    return true;
}

function validateItemId(){
    var itemid=document.getElementById('productid').value;
    if(itemid.length==0){
        itemIdError.innerHTML='please enter item id';
        return false;
    }
    if(!itemid.length>=1){
itemIdError.innerHTML='item id length should be greater than zero';
return false;
    }
    if(!itemid.match(/^[0-9]+$/)){
itemIdError.innerHTML='only digit possible';
return false;
    }
    itemIdError.innerHTML='';
    return true;
}

function validateItemName(){
    var itemName=document.getElementById('productname').value;
    var reg = /^[a-zA-Z]+$/;
    if(itemName.length==0){
        itemNameError.innerHTML='product name is required';
        return false;
    }
    if(!itemName.match(reg)){
        itemNameError.innerHTML='item name only contians letter';   
        return false;
    }
    itemNameError.innerHTML='<i class="fa-solid fa-check"></i>';
    return true;
}
function validateQuantity(){
    var quantity=document.getElementById('productquantity').value;
    if(quantity=="" || quantity==null){
        itemQuantityError.innerHTML='please insert quantity';
    }

        
            if (isNaN(quantity) && !quantity==0) {
                itemQuantityError.innerHTML='only digit possible';
                return false;
            }
            itemQuantityError.innerHTML='';
            return true;
        }
        function validateReceiverId(){
            var receiverid=document.getElementById('receiverid').value;
            if(receiverid.length==0){
                receiverIdError.innerHTML='please enter receiver id';
                return false;
            }
            if(!receiverid.length>=1){
                receiverIdError.innerHTML='receiver id length should be greater than zero';
        return false;
            }
            if(!receiverid.match(/^[0-9]+$/)){
                receiverIdError.innerHTML='only digit possible';
        return false;
            }
            receiverIdError.innerHTML='';
            return true;
        }
        function validateReceiverName(){
            var receiverName=document.getElementById('receivername').value;
            var reg = /^[a-zA-Z]+$/;
            if(receiverName.length==0){
                receiverNameError.innerHTML='receiver name is required';
                return false;
            }
            if(!receiverName.match(reg)){
                receiverNameError.innerHTML='receiver name only contians letter';   
                return false;
            }
            receiverNameError.innerHTML='<i class="fa-solid fa-check"></i>';
            return true;
        }
        function validateRemark(){
            var remark=document.getElementById('remark').value;
            var required=40;
            var left=required-remark.length;
            if(left>0){
                remarkError.innerHTML=left+'more char is left';
                return false;
            }
            remarkError.innerHTML='';
            return true;
        }
        function isValidDate(dateString) {
            var dateRegex = /^(\d{4})-(\d{2})-(\d{2})$/;
        
            if (dateRegex.test(dateString)) {
                var selectedDate = new Date(dateString);
                var today = new Date();
        
                // Set hours, minutes, seconds, and milliseconds to zero for accurate comparison
                selectedDate.setHours(0, 0, 0, 0);
                today.setHours(0, 0, 0, 0);
        
                return selectedDate.getTime() === today.getTime();
            } else {
                dateError.innerHTML="incorrect date";
                return false;
            }
        }
        function checkDate() {
            var dateInput = document.getElementById('dateInput').value;
        
            if (isValidDate(dateInput)) {
                alert("The date is valid and is today's date!");
            } else {
                alert("Invalid date or not today's date.");
            }
        }
    function validateForm(){
        if(!validateSenderName()|| !validateItemId() || !validateItemName() || !validateQuantity() || !validateReceiverId() || !validateReceiverName() || !validateRemark() ||! checkDate()){
            submitError.style.display='block';
            submitError.innerHTML='please fill the form correctly';
           setTimeout(function(){
            submitError.style.display='none';
        },3000)
            return false; 
        }
    }