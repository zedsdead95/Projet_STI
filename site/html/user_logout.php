/**
* Source from : https://www.tutorialspoint.com/php/php_login_example.htm
**/

<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["pass"]);
   
   echo 'You have exited session';
   header('Refresh: 2; URL = login.php');
?>