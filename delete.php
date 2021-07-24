<?php
require_once 'database/Database.php';
$db = new Database;

$id = base64_decode( $_REQUEST['id'] );
$delete = $db->query( "DELETE FROM planetas WHERE id={$id}" );

if ( $delete ) return header('Location: index.php'); else echo "no delete";


