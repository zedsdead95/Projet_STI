*/
*
* We simply add a new user
*
/*

<?php
if (isset($_POST['email'])) {

    $username = $_POST['email'];
    $password = $_POST['pass'];
    $role = $_POST['role'];
    if ($_POST['isActive'] == 1) {
        $activate = 1;
    } else {
        $activate = 0;
    }

    // check if username is available
    if ($db->usernameExists($username)) {
        $error = "Username already exists. Choose a new one.";
    }else{
        $db->insertUser($username, $password, $role, $activate);
        header("location: /admin.php");
    }
}

if (isset($error)){
    echo $error;
}

?>