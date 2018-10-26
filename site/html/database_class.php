/**
* Source : https://github.com/BestsoftCorporation/PHP-SQLITE-registration-login-form/blob/master/login.php
*
* Here we simply open the database and specify all actions that could be done within it.
**/

<?php


include_once('user_class.php');

class MyDB extends SQLite3
{
      function __construct()
      {
         $this->open('databases/database.sqlite');
      }
   
   
   function getUser(){
   		$sql ='SELECT * from Accounts where Username="'.$_POST["username"].'";';
   	 	$ret = $db->query($sql);
   
   	 	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      	  	// creates new user
			
			$user = new User($row['Id'],$row["Username"],$row['Password'],$row['Role'],$row['isActive']);
		}
    } 

    function checkIfUsernameExist(){
        $sql ='SELECT * from Accounts where username="'.$_POST["usr_name"].'";';
         $ret = $db->query($sql);

         while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
             // creates new user
         
         $user = new User($row['ID'],$row["USERNAME"],$row['PASSWORD'],$row['role'],$row['accountIsActive']);
     }
 } 
   //echo "Operation done successfully\n";
}

?>