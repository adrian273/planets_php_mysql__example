<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//-----------------------------------

require_once './database/Database.php';

class Planeta {

    private $nombre;
    private $diametro;
    private $masa;
    private $radio_orbital;
    private $id;

    function __construct($nombre, $diametro, $masa, $radio_orbital, $id = null) {
        $this->nombre = $nombre;
        $this->diametro = $diametro;
        $this->masa = $masa;
        $this->radio_orbital = $radio_orbital;
        $this->id = $id;
    }

    function __store() {
        $db = new Database;
        $SQL = "INSERT INTO planetas(nombre, diametro, masa, radio_orbital) 
            VALUES ('{$this->nombre}', {$this->diametro}, {$this->masa}, {$this->radio_orbital})";
        return $db->query( $SQL );
    }

    function __update() {
        $db = new Database;
        $SQL = "UPDATE planetas SET nombre='{$this->nombre}',
            diametro={$this->diametro}, masa={$this->masa}, radio_orbital={$this->radio_orbital} 
            WHERE id={$this->id}";
        return $db->query( $SQL );
    }

    static function __getById( $id ) {
        $db = new Database;
        $SQL = "SELECT * FROM planetas WHERE id={$id}";
        return $db->query( $SQL );
    }

}