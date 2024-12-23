<?phpsession_start();
    require_once('../model/userModel.php');

    // Ensure the user is logged inif (!isset($_SESSION['username'])) {
        header('location: login.html');
        exit();
    }
    // Fetch all users$users = getAllUsers();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
</head>
<body>    
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <h2>All Users</h2>
    <table border="1">
        <tr>            <th>ID</th>            <th>Username</th>            <th>Email</th>            <th>Actions</th>        </tr>        <?php foreach ($users as $user) { ?>            <tr>                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>                    <!-- Update Form -->                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
                        <input type="password" name="password" placeholder="New password" required>
                        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
                        <input type="submit" value="Update">
                    </form>
                    <!-- Delete Form -->                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete?');">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <h2>Add New User</h2>
    <form method="POST" action="../controller/SignupCheckup.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <input type="submit" name="submit" value="Add User">
    </form>

    <a href="logout.php">Logout</a>
</body>
</html>