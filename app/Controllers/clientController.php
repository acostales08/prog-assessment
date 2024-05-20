<?php

include_once "../Database/database.php";
include_once "../Queries/Query.php";

interface client {
    public function postData($data);
    public function fetchData();
    public function updateData($data);
    public function deleteData($data);
    public function loginData($data);
}

class userController extends Database implements client {
    public function postData($data) {
        $sql = new QueryBuilder;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($this->php_prepare($sql->postQuery("post/employee"))) {
                $this->php_dynamic_handler(":fullname", $data['fullname']);
                $this->php_dynamic_handler(":address", $data['address']);
                $this->php_dynamic_handler(":birthdate", $data['birthDate']);
                $this->php_dynamic_handler(":age", $data['age'], 1);
                $this->php_dynamic_handler(":gender", $data['gender']);
                $this->php_dynamic_handler(":civilstat", $data['civilStatus']);
                $this->php_dynamic_handler(":contactnum", $data['contactNo']);
                $this->php_dynamic_handler(":salary", $data['salary'], 1);
                $this->php_dynamic_handler(":isactive", $data['active'], 1);
    
                if ($this->php_execute()) {
                    $response = array(
                        "status" => "success",
                        "message" => "Post success"
                    );
                    echo json_encode($response);
                } else {
                    $response = array(
                        "status" => "error",
                        "message" => "Something went wrong"
                    );
                    echo json_encode($response);
                }
            }
        }
    }
    public function fetchData(){
        $sql = new QueryBuilder;
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if ($this->php_prepare($sql->fetchQuery("fetch/employee"))) {
                $this->php_execute();
                if($this->php_row_check()){
                    $data = $this->php_fetchAll();
                    echo json_encode($data);
                }else{
                    $response = array(
                        "status" => 404,
                        "message" => "No Record Found"
                    );
                    echo json_encode($response);
                }
            }
        }
    }
    public function updateData($data){
        $sql = new QueryBuilder;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($this->php_prepare($sql->updateQuery("update/employee"))){

                $this->php_dynamic_handler(":recid", $data['recid'], 1);
                $this->php_dynamic_handler(":fullname", $data['fullname']);
                $this->php_dynamic_handler(":address", $data['address']);
                $this->php_dynamic_handler(":birthdate", $data['birthDate']);
                $this->php_dynamic_handler(":age", $data['age'], 1);
                $this->php_dynamic_handler(":gender", $data['gender']);
                $this->php_dynamic_handler(":civilstat", $data['civilStatus']);
                $this->php_dynamic_handler(":contactnum", $data['contactNo']);
                $this->php_dynamic_handler(":salary", $data['salary'], 1);
                $this->php_dynamic_handler(":isactive", $data['active'], 1);

                if($this->php_execute()){
                    $response = array(
                        "status" => "success",
                        "message" => "Update success"
                    );
                    echo json_encode($response);
                }else{
                    $response = array(
                        "status" => "error",
                        "message" => "Something went wrong"
                    );
                    echo json_encode($response);
                }
            }
        }
    }
    public function deleteData($data) {
        $sql = new QueryBuilder;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($this->php_prepare($sql->deleteQuery("delete/employee"))) {
                $this->php_dynamic_handler(":recid", $data['deleteRecId'], 1);
                if ($this->php_execute()) {
                    $response = array(
                        "status" => "success",
                        "message" => "Delete success"
                    );
                    echo json_encode($response);
                } else {
                    $response = array(
                        "status" => "error",
                        "message" => "Something went wrong"
                    );
                    echo json_encode($response);
                }
            }
        }
    }

    public function loginData($data) {
        $sql = new QueryBuilder;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($this->php_prepare($sql->loginQuery("login/user"))) {
                $this->php_dynamic_handler(":email", $data['email']);
                $this->php_dynamic_handler(":password", $data['password']);
                if ($this->php_execute()) {
                    $user = $this->php_fetch();
                    if ($user) {
                        session_start();
                        $_SESSION['username'] = $user['username'];
                        $response = array(
                            "status" => "success",
                            "message" => "Login success"
                        );
                        echo json_encode($response);                        
                    } else {
                        $response = array(
                            "status" => "error",
                            "message" => "Login failed"
                        );
                        echo json_encode($response);
                    }

                } else {
                    $response = array(
                        "status" => "error",
                        "message" => "Something went wrong"
                    );
                    echo json_encode($response);
                }
            }
        }
    }
    
}