<?php
    session_start();
 
    require_once('../model/empmodel.php');
   
    if(isset($_COOKIE['flag'])){
 
    $employees = getAllEmployee();
?>
 
<html lang="en">
<head>
    <title>Searcht</title>
    <script>
        function searchEmployee() {
            let query = document.getElementById('search').value;
            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', 'searchEmployee.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('query=' + query);
 
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('employeeTable').innerHTML = this.responseText;
                }
            }
        }
    </script>
</head>
<body>
        <h2>Search Here </h2>
        <a href="home.php">Back</a> |
        <a href="logout.php">logout</a>
 
        <input type="text" id="search" onkeyup="searchEmployee()" placeholder="Search by name..." />
 
        <table border=1>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee_name</th>
                    <th>Contact_no</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="employees">
                <?php
                    for($i=0; $i< count($employees); $i++){
                ?>
                <tr>
                    <td><?php echo $employees[$i]['id']; ?></td>
                    <td><?php echo $employees[$i]['employee_name']; ?></td>
                    <td><?php echo $employees[$i]['contact_no']; ?></td>
                    <td><?php echo $employees[$i]['username']; ?></td>
                     
                    <td>
                        <a href='update.php?id=<?=$employees[$i]['id']?>'> UPDATE </a> |
                        <a href='delete.php?id=<?=$employees[$i]['id']?>'> DELETE </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
</body>
</html>
 
<?php
    }else{
        header('location: login.html');
    }
?>