/**
* Source : https://github.com/BestsoftCorporation/PHP-SQLITE-registration-login-form/blob/master/login.php
**/

<?php

class MyDB extends SQLite3
{
      function __construct()
      {
         $this->open('database.sqlite');
      }
   }
   $db = new MyDB(); // create varaible database
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      //echo "Opened database successfully\n";
   }
   
   function getUser(){
   		$sql ='SELECT * from USERS where USERNAME="'.$_POST["usr_name"].'";';
   	 	$ret = $db->query($sql);
   
   	 	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      	  	// creates new user
			$id=$row['ID'];
      	  	$username=$row["USERNAME"];
      	  	$password=$row['PASSWORD'];
			
			$user = new User($row['ID',$row["USERNAME"],$row['PASSWORD'],$row['role'],$row['accountIsActive']);
		}
  
   //echo "Operation done successfully\n";
}
?>