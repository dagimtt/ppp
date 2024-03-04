const inameError = document.getElementById('span1');
const iidError = document.getElementById('span2');
const itypeError = document.getElementById('span3');
const iquantityError = document.getElementById('span4');
const idateError = document.getElementById('span5');
const isubmitError = document.getElementById('span6');
const succMessage = document.getElementById('span7');

function validateItemName() {
    var iname = document.getElementById('itemName').value;
    var reg = /^[a-zA-Z]+$/;
    if (iname.length === 0) {
        inameError.textContent = 'Item Name is Required';
        return false;
    }
    if (!iname.match(reg)) {
        inameError.textContent = 'Item Name only contains letters';
        return false;
    }
    inameError.textContent = '';
    return true;
}

function validateItemId() {
    var iid = document.getElementById('itemId').value;
    var regular = /^\d\w+$/;
    if (iid.length === 0) {
        iidError.textContent = 'Item ID is Required';
        return false;
    }
    if (!iid.match(regular)) {
        iidError.textContent = 'Item ID must start by Digit';
        return false;
    }
    iidError.textContent = '';
    return true;
}

function validateItemType() {
    var itype = document.getElementById('itemType').value;

    if (itype === "") {
        itypeError.textContent = 'Please select an Item Type';
        return false;
    }

    itypeError.textContent = '';
    return true;
}

function validateItemQuantity() {
    var iquantity = document.getElementById('itemQuantity').value;
    var regular = /^\d+$/;

    if (iquantity === "") {
        iquantityError.textContent = 'Item Quantity is Required';
        return false;
    }

    if (!iquantity.match(regular)) {
        iquantityError.textContent = 'Item Quantity must contain only digits';
        return false;
    }

    iquantityError.textContent = '';
    return true;
}

function validateDate() {
    var idate = document.getElementById('registrationDate').value;
    var regular = /^\d{4}-\d{2}-\d{2}$/;

    if (idate === "") {
        idateError.textContent = 'Date is Required';
        return false;
    }

    if (!idate.match(regular)) {
        idateError.textContent = 'Please enter a valid date in the format YYYY-MM-DD';
        return false;
    }

    idateError.textContent = '';
    return true;
}

function validateForm() {

    
    if (!validateItemName() || !validateItemId() || !validateItemType() || !validateItemQuantity() || !validateDate()) {
        isubmitError.style.display = 'block';
        isubmitError.textContent = 'Please fill the form properly';
        setTimeout(function () {
            isubmitError.style.display = 'none';
        }, 3000);
        return false;
    }
 
  //  succMessage.textContent = "     Registration Successful     ";
 
}



