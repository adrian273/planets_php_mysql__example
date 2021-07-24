<?php

require_once 'layouts/Layout.php';

$layout = new Layout;
echo $layout->__head('login');
?>

<div class="container">
    <form action="auth.php" method="post">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Login</h1>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                        Email
                    </label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control form-control-sm" id="colFormLabelSm" 
                        placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                        Password
                    </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control form-control-sm" id="colFormLabelSm" 
                        placeholder="" name="passw">
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

