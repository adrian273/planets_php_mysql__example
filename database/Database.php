<?php

require_once 'config.php';

class Database extends mysqli {

    function __construct() {
        parent::__construct( HOST, USER, PASSW, DB_NAME );
        if ($this->connect_errno) die('connect error'. $this->connect_errno);
    }


}