<?php
    session_start();
    include 'security_check.php';
    include 'admin_check.php';
    $file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                                PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id']) ) {
        $req = $file_db->prepare('
            DELETE FROM user
            WHERE id = :id
        ');

        $req->execute(array(
            'id' => $_GET['id']
        ));
    }
    header("Location: users_management.php");
    exit();
?> 
