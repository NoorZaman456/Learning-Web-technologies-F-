<?php
session_start();
require_once('../model/empmodel.php');

if (isset($_COOKIE['flag'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $employees = getEmployee($id);
        
        if ($employees) {
        
            $status = deleteEmployee($id);
            if ($status) {
                header('Location: search.php'); 
            } else {
                echo "Failed to delete user.";
            }
        } else {
            echo "Employee not found.";
        }
    } else {
        echo "Invalid request.";
    }
} else {
    header('Location: login.html');
}
?>
