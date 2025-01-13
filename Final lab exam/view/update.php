<?php
session_start();
require_once('../model/empmodel.php');
if (isset($_COOKIE['flag'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Update Employee</title>
        <script>
            function validateForm() {
                const employee_name = document.forms['updateForm']['employee_name'].value.trim();
                const contact_no = document.forms['updateForm']['contact_no'].value.trim();
                const username = document.forms['updateForm']['username'].value.trim();
                const password = document.forms['updateForm']['password'].value.trim();
 
                let isValid = true;
                let errorMessage = "";
 
                if (empname === "") {
                    errorMessage += "Name cannot be empty.\n";
                    isValid = false;
                }
 
                if (contactNo === "" || isNaN(contactNo)) {
                    errorMessage += "Contact number must be valid.\n";
                    isValid = false;
                }
 
                if (username === "") {
                    errorMessage += "Username cannot be empty.\n";
                    isValid = false;
                }
 
                if (password === "" || password.length < 6) {
                    errorMessage += "Password must be at least 6 characters long.\n";
                    isValid = false;
                }
 
                if (!isValid) {
                    alert(errorMessage);
                }
 
                return isValid;
            }
        </script>
    </head>
    <body>
        <form name="updateForm" method="post" action="update.php" onsubmit="return validateForm()">
            <input type="hidden" name="id" value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>">
           
            <label for="employee_name">Name:</label>
            <input type="text" id="employee_name" name="employee_name" value="<?php echo isset($_POST['employee_name']) ? $_POST['employee_name'] : ''; ?>"> <br>
           
            <label for="contact_no">Contact No:</label>
            <input type="text" id="contact_no" name="contact_no" value="<?php echo isset($_POST['contact_no']) ? $_POST['contact_no'] : ''; ?>"> <br>
           
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"> <br>
           
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"> <br>
           
            <input type="submit" name="submit" value="Update">
        </form>
    </body>
    </html>
    <?php
    if (isset($_POST['submit'])) {
        $id = isset($_POST['id']) ? $_POST['id'] : $_SESSION['id'];
 
        $employee_name = trim($_POST['employee_name']);
        $contact_no = trim($_POST['contact_no']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
 
        if (empty($employee_name) || empty($contact_no) || empty($username) || empty($password)) {
            echo "All fields are required!";
        } else {
            $employees = [
                'id' => $id,
                'empname' => $employee_name,
                'contact_no' => $contact_no,
                'username' => $username,
                'password' => $password,
            ];
 
            $status = updateEmployee($employee_name);
            if ($status) {
                header('location: search.php');
            } else {
                echo "Failed to update user.";
            }
        }
    }
} else {
    header('location: login.html');
}
?>