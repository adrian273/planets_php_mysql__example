<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//-----------------------------------
require_once 'layouts/Layout.php';
require_once 'models/Planeta.php';

$layout = new Layout;

echo $layout->__head('Agregar nuevo planeta');
?>

<div class="container">

    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Agregar Planeta</h1>
        </div>
        <div class="card-body">
        <form method="post">
            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                    Nombre
                </label>
                <div class="col-sm-10">
                    <input type="text" name="nombre" class="form-control form-control-sm" id="colFormLabelSm" 
                    placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                    diametro
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" 
                    placeholder="" name="diametro">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                    masa
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" 
                    placeholder="" name="masa">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                    radio orbital
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" 
                    placeholder="" name="radio_orbital">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                    
                </label>
                <div class="col-sm-10">
                    <button class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </form>
        </div>
    </div>

</div>

<?= $layout->__footer(); ?>
<?php

if ($_POST) {
    
    $nombre = $_POST['nombre'] ?: '';
    $diametro = $_POST['diametro'] ?: 0;
    $masa = $_POST['masa'] ?: 0;
    $radio_orbital = $_POST['radio_orbital'] ?: 0;

    $planeta = new Planeta($nombre, $diametro, $masa, $radio_orbital);
    if( $planeta->__store() ) {
        return header('Location: index.php');
    } 
}
