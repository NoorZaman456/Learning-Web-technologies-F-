<?php
require_once('../model/empmodel.php');

if(isset($_POST['submit'])){
    $username    = trim($_POST['username']);
    $password    = trim($_POST['password']);
    $employee_name = trim($_POST['email']);  
    $contact_no  = trim($_POST['contact_no']);

    if(empty($username) || empty($password) || empty($employee_name) || empty($contact_no)){
        echo "Null data found!";
    } else {
        
        $status = addEmployee($username, $password, $employee_name, $contact_no);
        if($status){
            header('Location: ../view/login.html');
        } else {
            header('Location: ../view/signup.html');
        }
    }
} else {
    header('Location: ../view/signup.html');
}
?>

