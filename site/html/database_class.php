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
   		$sqlrqst ='SELECT * FROM Accounts WHERE Username="'.$_POST["username"].'";';
   	 	$result = $db->query($sqlrqst);
   
   	 	while($row = $result->fetchArray(SQLITE3_ASSOC) ){
      	  	// creates new user
			
			$user = new User($row["Username"],$row['Id'],$row['Password'],$row['Role'],$row['IsActive']);
		}
    } 

    function checkIfUsernameExist(){
        $sqlrqst ='SELECT * FROM Accounts WHERE Username="'.$_POST["username"].'";';
         $result = $db->query($sqlrqst);

         while($row = $result->fetchArray(SQLITE3_ASSOC) ){
         
         $user = new User($row["Username"],$row['Id'],$row['Password'],$row['role'],$row['IsActive']);
     }

     function getUsernameFromId($id){
        $sqlrqst ="SELECT * FROM Accounts WHERE Id ='$id'";
         $result = $db->query($sqlrqst);

         while($row = $result->fetchArray(SQLITE3_ASSOC) ){
         
         $user = new User($row["Username"],$row['Id'],$row['Password'],$row['role'],$row['IsActive']);
     }
 } 
   //echo "Operation done successfully\n";
}

?>