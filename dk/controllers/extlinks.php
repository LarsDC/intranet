<?php
class Extlinks extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->render('extlinks/index');        
    }

}

?>