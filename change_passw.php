<?php

require_once 'layouts/Layout.php';
require_once 'database/Database.php';
$db = new Database;
$layout = new Layout;
echo $layout->__head('Change your password');
session_start();
?>

<div class="container">
    <form  method="post">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Change your password</h1>
            </div>
            <div class="card-body">
                <div class="form-group row">
                   
                        <input type="hidden" name="user_id" class="form-control form-control-sm" id="colFormLabelSm" 
                        value="<?= $_SESSION['id'] ?>">
             
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                        Old Password
                    </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control form-control-sm" id="colFormLabelSm" 
                        placeholder="" name="old_passw">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                        New Password
                    </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control form-control-sm" id="colFormLabelSm" 
                        placeholder="" name="new_passw">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-block btn-primary btn"> Ingresar </button>
                </div>
            </div>
        </div>
    </form>
</div>

<?= $layout->__footer() ?>

<?php 

if ($_POST) {
    
    $old_pasw = base64_encode( $_POST['old_passw'] );
    $new_passw = base64_encode( $_POST['new_passw'] );
    $id = $_POST['user_id'];
    $SQL = "SELECT passw FROM users WHERE id={$id} AND passw='{$old_pasw}' ";
    $query = $db->query( $SQL );
    echo var_dump( $query );
    if ( $query->num_rows > 0 ) {
        $SQL_UPDATE = "UPDATE users SET passw='{$new_passw}' WHERE id={$id} ";
        $query_update = $db->query( $SQL_UPDATE );
        if ( $query_update ) {
            echo "contraseña cambiada con exito!";
            return header('Location: login.php');
        } else {
            echo "no se cambio la contraseña";
        }
    } else {
        echo "contraseña vieja invalida";
    }

    
}