function updateModalContent(action, recid, fullname, address, birthdate, age, gender, civilstat, contactnum, salary, isactive) {
    let modalTitle = $('#crudModal .modal-title');
    let modalBody = $('#crudModal .modal-body');
    let actionButton = $('#crudActionButton');

    switch(action){
        case 'create':
            modalTitle.text('Add new employee');
            modalBody.load("app/Component/form/employeeForm.php");
            actionButton.text('Create');
            actionButton.removeClass().addClass('btn btn-primary');
            actionButton.off('click').on('click', function() {
                const validationResult = validateFormFields();
                    if(validationResult.isValid){ 
                        let fullname = document.getElementById("txtFullName").value;
                        let address = document.getElementById("txtAddress").value;
                        let birthDate = document.getElementById("txtBirthDate").value;
                        let age = document.getElementById("txtAge").value;
                        let gender = document.querySelector('input[name="gender"]:checked').value;
                        let civilStatus = document.getElementById("txtCivilStatus").value;
                        let contactNo = document.getElementById("txtContactNo").value;
                        let salary = document.getElementById("txtSalary").value;
                        let active = document.getElementById("activeStatus").checked ? 1 : 2;
    
                        handleCreateAction({
                            fullname,
                            address,
                            birthDate,
                            age,
                            gender,
                            civilStatus,
                            contactNo,
                            salary,
                            active
                        });  
                    } else {
                        // Display the error message
                        console.log(validationResult.errorMessage);
                        // You can display the error message to the user as needed
                    }
                    let fullname = document.getElementById("txtFullName").value;

            });
            break;
        case 'update':
            modalTitle.text('update employee');
            modalBody.load("app/Component/form/employeeForm.php", function() {
                $('#txtFullName').val(fullname);
                $('#txtAddress').val(address);
                $('#txtBirthDate').val(birthdate);
                $('#txtAge').val(age);
                $('#gender').val(gender);
                if (gender === 'male') {
                    $('#genderMale').prop('checked', true);
                } else if (gender === 'female') {
                    $('#genderFemale').prop('checked', true);
                } else if (gender === 'other') {
                    $('#genderOther').prop('checked', true);
                }
                $('#txtCivilStatus').val(civilstat);
                $('#txtContactNo').val(contactnum);
                $('#txtSalary').val(salary);
                $('#activeStatus').prop('checked', isactive == 1);
            });
            actionButton.text('Update');
            actionButton.removeClass().addClass('btn btn-primary');
            actionButton.off('click').on('click', function() {
                if(validateFormFields()){ // Validate the form fields before updating
                    let updateRecId = recid
                    let updateFullname = document.getElementById("txtFullName").value;
                    let updateAddress = document.getElementById("txtAddress").value;
                    let updateBirthDate = document.getElementById("txtBirthDate").value;
                    let updateAge = document.getElementById("txtAge").value;
                    let updateGender = document.querySelector('input[name="gender"]:checked').value;
                    let updateCivilStatus = document.getElementById("txtCivilStatus").value;
                    let updateContactNo = document.getElementById("txtContactNo").value;
                    let updateSalary = document.getElementById("txtSalary").value;
                    let updateActive = document.getElementById("activeStatus").checked ? 1 : 0;

                    handleUpdateAction({
                        updateRecId,
                        updateFullname,
                        updateAddress,
                        updateBirthDate,
                        updateAge,
                        updateGender,
                        updateCivilStatus,
                        updateContactNo,
                        updateSalary,
                        updateActive
                    });
                }
            });
            break;
        case 'delete':
            modalTitle.text('delete employee');
            modalBody.html('Are you sure you want to delete this user');
            actionButton.text('Delete');
            actionButton.removeClass().addClass('btn btn-danger');
            actionButton.off('click').on('click', function() {
                let deleteId = recid;
                handleDeleteAction(deleteId); 
            });
            break;
        default:
            modalTitle.text('');
            modalBody.load('');
            actionButton.text('');
            break;
    }
}
