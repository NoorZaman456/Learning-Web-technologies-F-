<?php

function getConnection(){
    $con = mysqli_connect('127.0.0.1', 'root', '', 'emp');
    return $con;
}

function login($username, $password){
    $con = getConnection();
    $sql = "select * from employees where username='{$username}' and password='{$password}'";
    $result = mysqli_query($con, $sql);
    $count =  mysqli_num_rows($result);

    if($count ==1){
        return true;
    }else{
        return false;
    }
}

function addEmployee($username, $password, $employee_name, $contact_no){
    $con = getConnection();
    $sql = "insert into employees VALUES('', '{$username}', '{$password}', '{$employee_name}', '{$contact_no}')";        
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}

function getEmployee($id){
    $con = getConnection();
    $sql = "select * from employees where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $employee = mysqli_fetch_assoc($result);
    return $employee;
}

function getAllEmployee(){
    $con = getConnection();
    $sql = "select * from employees";
    $result = mysqli_query($con, $sql);
    $employees = [];
    while($row = mysqli_fetch_assoc($result)){
        $employees[] = $row;
    }
    return $employees;
}

function updateEmployee($user){
    $con = getConnection();
    $sql = "update employees set username='{$user['username']}', password='{$user['password']}', employer_name='{$user['employer_name']}', company_name='{$user['company_name']}', contact_no='{$user['contact_no']}' where id='{$user['id']}'";
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}

function deleteEmployee($id){
    $con = getConnection();
    $sql = "delete from employees where id='{$id}'";
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}

?>
