
let email = document.getElementById('txtemail')
let password = document.getElementById('txtpassword')

$('#btnOnSubmit').click((event) => {
    event.preventDefault();
    
    let obj = {
        email: email.value,
        password: password.value,
        islog: true
    };
    console.log(obj)
    clientRequest(obj).then((response) => {
        console.log(response)
        const data = JSON.parse(response)
        if(data.status === "success"){
            alert(data.message)
            window.location.href = "employee.php";
        }
    })

});

//insert data function
const handleCreateAction = (props) => {
    const {fullname, 
        address, 
        birthDate, 
        age, 
        gender, 
        civilStatus, 
        contactNo, 
        salary, 
        active } = props

    let obj = {
        fullname: fullname,
        address: address,
        birthDate: birthDate,
        age: age,
        gender: gender,
        civilStatus: civilStatus,
        contactNo: contactNo,
        salary: salary,
        active: active,
        isbool: true
    }
    clientRequest(obj).then((response) => {
        console.log(response)
        const data = JSON.parse(response)
        if(data.status === "success"){
            location.reload()
        }
    })
}

//update data function
const handleUpdateAction = (props) => {
    const {updateRecId, 
        updateFullname, 
        updateAddress, 
        updateBirthDate, 
        updateAge, 
        updateGender, 
        updateCivilStatus, 
        updateContactNo, 
        updateSalary, 
        updateActive} = props

    let obj = {
        recid: updateRecId,
        fullname: updateFullname,
        address: updateAddress,
        birthDate: updateBirthDate,
        age: updateAge,
        gender: updateGender,
        civilStatus: updateCivilStatus,
        contactNo: updateContactNo,
        salary: updateSalary,
        active: updateActive,
        isUpdate: true
    }

    console.log(obj)
    clientRequest(obj).then((response) => {
        const data = JSON.parse(response)
        if(data.status === "success"){
            location.reload()
        }
    })
}

//delete data function
const handleDeleteAction = (recid) => {
    let obj = {
        deleteRecId: recid,
        isDelete: true
    }
    clientRequest(obj).then((response) => {
        const data = JSON.parse(response)
        if(data.status === "success"){
            location.reload()
        }
    })
}

//fetch data
$("document").ready(() => {
    fetchData().then((response) => {
        const data = JSON.parse(response);
        const message = data.message;
        console.log(data)
        if(data.status === 404){
            $("#tableData").append(`
            <tr>
                <td colspan="11" class="text-center fs-6 fw-lighter">${message}</td>
            </tr>
            `)
        }else{
            data.forEach((props) => {

                const {recid, 
                    fullname, 
                    address, 
                    birthdate, 
                    age, 
                    gender, 
                    civilstat,
                    contactnum, 
                    salary, 
                    isactive} = props
                    
                const isActiveText = isactive === 1 ? 'Active' : 'Not Active';
                $("#tableData").append(`
                <tr>
                    <td>${recid}</td>
                    <td>${fullname}</td>
                    <td>${address}</td>
                    <td>${birthdate}</td>
                    <td>${age}</td>
                    <td>${gender}</td>
                    <td>${civilstat}</td>
                    <td>${contactnum}</td>
                    <td>${salary}</td>
                    <td>${isActiveText}</td>
                    <td>
                    <button type="button" class="btn btn-sm btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#crudModal" 
                    onClick="
                    updateModalContent('update', 
                    '${recid}', 
                    '${fullname}', 
                    '${address}', 
                    '${birthdate}', 
                    '${age}', 
                    '${gender}', 
                    '${civilstat}', 
                    '${contactnum}', 
                    '${salary}', 
                    '${isactive}')">
                        edit
                    </button>     
                    <button type="button" class="btn btn-sm btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#crudModal" 
                    onClick="updateModalContent('delete', '${recid}')">
                        delete
                    </button> 
                  </td>
                </tr>
                `)
            })
        }
    })
})

const clientRequest = (object) => {
    const promise = new Promise((resolve) => {
        $.post("app/Helper/helper.php", object, (response) => {
            resolve(response)
        })
    })
    return promise;
}

const fetchData = () => {
    const promise = new Promise((resolve) => {
        $.get("app/Helper/helper.php?fetchTrigger=true", (response) => {
            resolve(response)
        })
    })
    return promise;
}