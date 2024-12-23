<?phprequire_once('../model/userModel.php');

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        // Validate data (basic check)if ($username && $password && $email) {
            $status = updateUser($id, $username, $password, $email);
            if ($status) {
                header('Location: userlist.php'); // Redirect to user list after successful update            } else {
                echo "Update failed!";
            }
        } else {
            echo "Please fill all fields!";
        }
    }
?>