/**
* Source : https://github.com/BestsoftCorporation/PHP-SQLITE-registration-login-form/blob/master/login.php
*
* Here we do the validation of username and password entered by the user
*
**/
<?php
	
		
session_start();

if (isset($_POST['username'])){
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Missing username or password";
    }
    else {

        $user = $db->getUser($_POST['username']);

        if ($user != null){

            if ($user->isActivate()){
                $pwd = $_POST['password'];

                if ($db->validePassword($_POST['username'], $_POST['password'])){
                    $_SESSION['login']=$_POST['username'];
                    $_SESSION['user']=$user;
                    header('Location: /mail.php');
                }else{
                    $error = "Wrong Password";
                }
            } else {
                $error = "Account inactive";
            }
        }else{
            $error = "User not exists, please register to continue!";
        }
    }
}
	
?>