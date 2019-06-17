<?php
class Mediawatch extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->mediawatch = $this->rssmodel->fetchXML(DK_MEDIAWATCH, DK_MEDIAWATCH_FILE);
        $this->view->render('mediawatch/index');
    }

}

?>
