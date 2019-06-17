<?php
class Database extends PDO {
    function __construct() {
        parent::__construct('mysql:host='. 
                PATH .':3306;dbname='.
                DBNAME, USER, PASS);
    }
}
?>
