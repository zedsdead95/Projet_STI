<?php 
    if ($_SESSION['role'] != 1) {
    	echo "Access restricted";
    	exit();
    }
?> 
