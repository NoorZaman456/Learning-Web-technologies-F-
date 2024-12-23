<?phprequire_once('../model/userModel.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Delete the user$status = deleteUser($id);
        if ($status) {
            header('Location: userlist.php'); // Redirect to user list after successful deletion        } else {
            echo "Delete failed!";
        }
    }
?>