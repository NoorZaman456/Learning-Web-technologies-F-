<?phpsession_start();
    require_once('../model/userModel.php');

    if(isset($_COOKIE['flag'])) {
        if(isset($_REQUEST['id'])) {
            $userId = $_REQUEST['id'];
            $user = getUser($userId); // Get the user data for editing        }?>
<html>
<head>
    <title>Edit User</title>
</head>
<body>    <h2>Edit User</h2>    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
        Username: <input type="text" name="username" value="<?php echo $user['username']; ?>" /> <br>
        Password: <input type="password" name="password" value="<?php echo $user['password']; ?>" /> <br>
        Email: <input type="email" name="email" value="<?php echo $user['email']; ?>" /> <br>
        <input type="submit" name="submit" value="Update" />
    </form>
</body>
</html>

<?php
    } else {
        header('location: login.html');
    }
?>