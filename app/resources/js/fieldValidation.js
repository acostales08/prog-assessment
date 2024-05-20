 function validateFormFields() {
    const fields = [
        { id: "txtFullName", message: "Full Name is required" },
        { id: "txtAddress", message: "Address is required" },
        { 
            id: "txtContactNo", 
            message: "Contact No. must be a number", 
            validate: (value) => value === '' || /^\d+$/.test(value)
        }        
    ];

    let isValid = true;
    let errorMessage = '';

    document.querySelectorAll('.error-message').forEach(function(elem) {
        elem.remove();
    });

    fields.forEach(function(field) {
        const inputElement = field.type === "radio" ? 
            document.querySelector(`input[name="${field.name}"]`) : 
            document.getElementById(field.id);

        const errorMessageElement = document.createElement('span');
        errorMessageElement.className = 'error-message text-danger';
        errorMessageElement.id = `${field.id}Error`;
        errorMessageElement.style.fontSize = '12px';

        const value = inputElement.value.trim();
        const isValidField = !(!value || (field.validate && !field.validate(value)));

        if (!isValidField) {
            errorMessage = field.message; 
            errorMessageElement.innerText = errorMessage;
            inputElement.parentElement.appendChild(errorMessageElement);
            isValid = false;
        } else {
            errorMessageElement.innerText = '';
        }

        if (field.type === "radio") {

            const radioInputs = document.querySelectorAll(`input[name="${field.name}"]`);
            const isValidField = Array.from(radioInputs).some(function(input) {
                return input.checked;
            });
            if (!isValidField) {
                errorMessage = field.message; 
                errorMessageElement.innerText = errorMessage;
                radioInputs[0].parentElement.appendChild(errorMessageElement);
                isValid = false; 
            } else {
                errorMessageElement.innerText = '';
            }
        }
    });

    return { isValid, errorMessage }; 
}
