<?php
class Gallery extends Controller{

    function __construct() {
        parent::__construct();
        
        $this->view->render('gallery/index');
    }

}?>
