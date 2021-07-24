<?php

require_once 'database/Database.php';
$db = new Database;
session_start();

if ($_POST) {

    $email = $_POST['email'];
    $passw = base64_encode( $_POST['passw'] );
    $SQL = "SELECT id, email, passw FROM users WHERE email='{$email}' AND passw='{$passw}'";
    $query = $db->query( $SQL ); // TRUE OR FALSE;

    if ( $query->num_rows > 0 ) {
        $row = $query->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        echo "<script> alert('Usuario existe') </script> ";
        return header('Location: index.php');
    } else {
        echo "<script> alert('Usuario no existe') </script> ";
        return header('Location: login.php');
    }
    echo base64_encode( $passw );

}