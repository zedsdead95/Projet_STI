

<?php


$db = new MyDB(); // create varaible database
if(!$db){
   echo $db->lastErrorMsg();
} else {
   echo "Database opened  successfully\n";
}

?>