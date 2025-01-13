<?php
    session_start();
    if(isset($_COOKIE['flag'])){
?>
 
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>
        <h1>Welcome to Online Shop Management System! <?php echo $_SESSION['username']?></h1>
        <a href="search.php">View All Employeers</a> |
        <a href="../controller/logout.php">logout</a>
</body>
</html>
 
<?php
    }else{
        header('location: login.html');
    }
?>