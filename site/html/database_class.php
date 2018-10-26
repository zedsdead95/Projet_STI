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
   		$sqlrqst ='SELECT * FROM user WHERE username="'.$_POST["username"].'";';
   	 	$result = $db->query($sqlrqst);
   
   	 	while($row = $result->fetchArray(SQLITE3_ASSOC) ){
      	  	// creates new user
			
			$user = new User($row["username"],$row['id'],$row['password'],$row['role'],$row['isActive']);
        }
        
        return $user;
    } 

    function checkIfUsernameExist(){
        $sqlrqst ='SELECT * FROM user WHERE username="'.$_POST["username"].'";';
        $result = $db->query($sqlrqst);
 
        $id = "";
 
        while($row = $result->fetchArray(SQLITE3_ASSOC) ){
         $id = $row['Id'];
        }
         return ! $id == "";

    }

     function getUsernameFromId($id){
        $sqlrqst ="SELECT * FROM user WHERE id ='$id'";
        $result = $db->query($sqlrqst);
        
        $username = "";

        while($row = $result->fetchArray(SQLITE3_ASSOC) ){
            $username = $row['username'];
        }
        return $username;
     } 

     function getPassword($name){
        $sqlrqst="SELECT password FROM user WHERE username='$name'";
        $result= $this->query($sqlrqst);

        $pass = "";

        while($row = $result->fetchArray(SQLITE3_ASSOC) ){
            $pass = $row['password'];
        }
        return $pass;
    }

     function addNewUser($username, $password, $role = Role::Collaborator, $isActive = 1){
            $sqlrqst = "INSERT INTO t_user(username, password, role, activate) VALUES ('$username', '$password', '$role', $activate)";
            $result = $this->exec($sqlrqst);
    
            if (!$result) {
                echo $this->lastErrorMsg();
                return false;
            }
            return true;
        
     }

     function listAllUsers(){
         
        $sqlrqst="SELECT * FROM user";
        $result= $this->query($sqlrqst);

        $user_list = array(); // create a new list of users

        while($row = $result->fetchArray(SQLITE3_ASSOC) ){
            $user = new User($row["username"],$row['id'],$row['password'],$row['role'],$row['isActive']);
            array_push($user_list, $user);
        }
        return $user_list;
     }


     /**
      * 
      * Here we lists all functions that can be used by an Admin
      */
     function deleteUserById($id){
        $sqlrqst="DELETE FROM user WHERE id='$id'";

        $result = $this->exec($sqlrqst);
        if(!$result) {
            //echo $this->lastErrorMsg();
            return false;
        }
        return true;
    }

    function deleteMailFromId(){
        $sqlrqst="DELETE FROM mail WHERE id='$id'";

        $result = $this->exec($sqlrqst);
        if(!$result) {
            //echo $this->lastErrorMsg();
            return false;
        }
        return true;
    }

    function showMessageFromId($id){
        $sqlrqst="SELECT mail.id AS id, mail.source AS src_id, user.username AS src_name , mail.destination AS dst_id, user.username AS dst_name, mail.subject AS subject, mail.date_time AS date_time, mail.message AS message
        FROM mail 
        INNER JOIN user t_user_src ON t_message.source = t_user_src.id 
        INNER JOIN t_user t_user_dst ON t_message.destination = t_user_dst.id
        WHERE t_message.id ='$id'";
        $result= $this->query($sqlrqst);

        $mail = null;

         while($row = $result->fetchArray(SQLITE3_ASSOC) ){
             $mail = new Mail($row['id'], $row['src_id'], $row['src_name'], $row['dst_id'], $row['dst_name'], $row['subject'], $row['date_time'], $row['message']);
        }  
        return $mail;
    }

}

?>