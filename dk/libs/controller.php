<?php
class Controller {
    function __construct() {
        require 'models/dbmodel.php';
        require 'models/rssmodel.php';
        $this->dbmodel = new DBModel();
        $this->rssmodel = new RSSModel();
        $this->view = new View();
    }
}
?>
