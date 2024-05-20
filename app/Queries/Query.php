<?php

class QueryBuilder {
    public function loginQuery($condition) {
        if($condition == "login/user"){
            $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
            return $sql;
        }
    }
    public function postQuery($condition){
        if($condition == "post/employee"){
            $sql = "INSERT INTO employeefile (fullname, address, birthdate, age, gender, civilstat, contactnum, salary, isactive) VALUES (:fullname, :address, :birthdate, :age, :gender, :civilstat, :contactnum, :salary, :isactive)";
            return $sql;
        }
    }
    public function fetchQuery($condition){
        if($condition == "fetch/employee"){
            $sql = "SELECT * FROM employeefile";
            return $sql;
        }
    }
    public function updateQuery($condition){
        if($condition == "update/employee"){
            $sql = "UPDATE employeefile SET fullname = :fullname, address = :address, birthdate = :birthdate, age = :age, gender = :gender, civilstat = :civilstat, contactnum = :contactnum, salary = :salary, isactive = :isactive WHERE recid = :recid";
            return $sql;
        }
    }
    public function deleteQuery($condition) {
        if($condition == "delete/employee"){
            $sql = "DELETE FROM employeefile WHERE recid = :recid";
            return $sql;
        }
    }
}