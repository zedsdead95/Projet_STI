

<?php


$db = new MyDB(); // create variable database
if(!$db){
   echo $db->lastErrorMsg();
} else {
   echo "Database opened  successfully\n";
}

?>