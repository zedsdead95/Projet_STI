<?php 
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

            echo $result['isActive'];

            if(empty($result)) {
              header('Location: nothello.php');
            }
            elseif($result['isActive'] == 0) {
              echo('<span class="errors">Your account has been suspended</span>');
            }
            else
            {
              $_SESSION['id'] = $result['id'];
              $_SESSION['user'] = $result['username'];
              $_SESSION['password'] = $result['password'];
              $_SESSION['state'] = $result['isActive'];
              $_SESSION['role'] = $result['role'];
              header('Location: view_mail.php');
            }
          }
        ?>