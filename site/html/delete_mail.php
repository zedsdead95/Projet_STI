<?php
    session_start();
    $file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                                PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id']) ) {
        $req = $file_db->prepare('
            DELETE FROM mail
            WHERE id = :id AND destination = :user
        ');

        $req->execute(array(
            'id' => $_GET['id'],
            'user' => $_SESSION['username']
        ));
    }
    header("Location: tables.php");
    exit();
?> 
