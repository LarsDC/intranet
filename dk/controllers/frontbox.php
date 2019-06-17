<?php
class Frontbox extends Controller{

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->frontbox = $this->rssmodel->fetchXML(DK_FRONTBOX, DK_FRONTBOX_FILE);
        $this->view->render('frontbox/index');
    }

}
?>
