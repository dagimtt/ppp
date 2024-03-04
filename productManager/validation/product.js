const productIdError=document.getElementById('pro1');
const dateError=document.getElementById('pro8');
const productTypeError=document.getElementById('pro3');
const quantityError=document.getElementById('quan');
const submitError=document.getElementById('pro4');
function validateProductId(){
    var productid=document.getElementById('productid').value;
    if(productid.length==0){
        productIdError.innerHTML='please enter product id';
        return false;
    }
    if(!productid.length>=1){
        productIdError.innerHTML='product id length should be greater than zero';
return false;
    }
    if(!productid.match(/^[0-9]+$/)){
        productIdError.innerHTML='only digit possible';
return false;
    }
    productIdError.innerHTML='';
    return true;
}
function validateProductName(){
    var productname=document.getElementById('productname').value;
    var reg = /^[a-zA-Z]+$/;
    if(productname.length==0){
        productNameError.innerHTML='product name is required';
        return false;
    }
    if(!productname.match(reg)){
        productNameError.innerHTML='product name only contians letter';   
        return false;
    }
    productNameError.innerHTML='<i class="fa-solid fa-check"></i>';
    return true;
}

function validateTypeProduct(){
    var producttype=document.getElementById('producttype').value;
    if(producttype.length==0){
        productTypeError.innerHTML='';
        return false;
    }
    productTypeError.innerHTML='<i class="fa-solid fa-check"></i>';
    return true;

}
function quantity(){
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
    if( !validateProductId() || !validateProductName() || !validateTypeProduct() ||!quantity()|| !checkDate()){
        submitError.style.display='block';
        submitError.innerHTML='please fill the form correctly';
       setTimeout(function(){
        submitError.style.display='none';
    },3000)
        return false; 
    }
}