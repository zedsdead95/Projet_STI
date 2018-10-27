<?php 
  session_Start();
  $db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');

   if (isset($_POST["username"]) && isset($_POST["password"]) ) {
     $req = $db->prepare('
       SELECT *
       FROM user
       WHERE username = :username AND password = :password
    ');
     $req->execute( array(
       'username' => $_POST['username'],
       'password' => $_POST['password']
     ));
     $result = $req->fetch();
     if(empty($result)) {
       echo('<span class="errors">Wrong password or username does not exist</span>');
     }
     elseif($result['isActive'] == 0) {
       echo('<span class="errors">Account inactive</span>');
     }
     else {
       $_SESSION['id'] = $result['id'];
       $_SESSION['username'] = $result['username'];
       $_SESSION['password'] = $result['password'];
       $_SESSION['state'] = $result['isActive'];
       $_SESSION['role'] = $result['role'];
       header('Location: tables.php');
     }
   }
?>