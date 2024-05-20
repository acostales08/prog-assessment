<?php

include('../Controllers/clientController.php');

if(isset($_POST['isbool']) == true){
    $data = [
        "fullname" => $_POST['fullname'],
        "address" => $_POST['address'],
        "birthDate" => $_POST['birthDate'],
        "age" => $_POST['age'],
        "gender" => $_POST['gender'],
        "civilStatus" => $_POST['civilStatus'],
        "contactNo" => $_POST['contactNo'],
        "salary" => $_POST['salary'],
        "active" => $_POST['active']
    ];
    $callback = new userController();
    $callback->postData($data);
}

if(isset($_GET['fetchTrigger'])=== true){
    $fetchCallback = new userController();
    $fetchCallback->fetchData();
}

if(isset($_POST['isUpdate']) === true){
    $data = [
        "recid" => $_POST['recid'],
        "fullname" => $_POST['fullname'],
        "address" => $_POST['address'],
        "birthDate" => $_POST['birthDate'],
        "age" => $_POST['age'],
        'gender' => $_POST['gender'],
        "civilStatus" => $_POST['civilStatus'],
        "contactNo" => $_POST['contactNo'],
        "salary" => $_POST['salary'],
        "active" => $_POST['active'],
    ];
    $updateCallback = new userController();
    $updateCallback->updateData($data);
}

if(isset($_POST['isDelete']) === true){
    $data = [
        "deleteRecId" => $_POST['deleteRecId']
    ];
    $updateCallback = new userController();
    $updateCallback->deleteData($data);
}

if(isset($_POST['islog']) === true){
    $data = [
        "email" => $_POST['email'],
        "password" => $_POST['password']
    ];
    $loginCallback = new userController();
    $loginCallback->loginData($data);
}



?>