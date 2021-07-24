<?php 

/**
 * 
 * @author Adrian [ アドリアン ]
 * @since 2021年　7月　16日 (終わりました)
 * 
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//-----------------------------------
require_once 'layouts/Layout.php';
require_once 'database/Database.php';
$db = new Database;
$planets = $db->query(' SELECT * FROM planetas ORDER BY id DESC');
$URL = 'http://localhost/tutoria-test/planets/';

session_start();
//------------------------------------
$layout = new Layout;
echo $layout->__head('index');
echo $_SESSION['id'];
?>


<div class="container">
    <a href="add.php">Agregar nuevo</a>
    <div class="card">
        <div class="bg-primary text-white card-header">
            <h1> Lista Planetas </h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Diametro</th>
                        <th>Masa</th>
                        <th>Radio orbital</th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while( $row = $planets->fetch_assoc() ) : ?>
                        <tr>
                            <td> <?= $row['id'] ?> </td>
                            <td> <?= $row['nombre'] ?> </td>
                            <td> <?= $row['diametro'] ?> </td>
                            <td> <?= $row['masa'] ?> </td>
                            <td> <?= $row['radio_orbital'] ?> </td>
                            <td>
                            <a href="<?= $URL ?>delete.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-danger"> Eliminar </a>
                                <a href="<?= $URL ?>edit.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-warning"> Editar </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php echo $layout->__footer(); ?>


