<?php
class Error extends Controller{

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->msg = 'This page does not exist: '. $_SERVER['DOCUMENT_ROOT'] . $_GET['url'];
        $this->view->render('error/index');
    }

}
?>
