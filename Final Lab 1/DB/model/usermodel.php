<?phpfunction getConnection(){
    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    return $con;
}
// Login functionfunction login($username, $password){
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    mysqli_close($con);
    return $count == 1;
}
// Add userfunction addUser($username, $password, $email){
    $con = getConnection();
    $sql = "INSERT INTO users (username, password, email) VALUES ('{$username}', '{$password}', '{$email}')";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}
// Get a user by IDfunction getUser($id){
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE id='{$id}'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);
    mysqli_close($con);
    return $user;
}
// Get all usersfunction getAllUsers(){
    $con = getConnection();
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);
    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }    mysqli_close($con);
    return $users;
}
// Update a userfunction updateUser($id, $username, $password, $email){
    $con = getConnection();
    $sql = "UPDATE users SET username='{$username}', password='{$password}', email='{$email}' WHERE id='{$id}'";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}

// Delete a user by IDfunction deleteUser($id){
    $con = getConnection();
    $sql = "DELETE FROM users WHERE id='{$id}'";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}
?>