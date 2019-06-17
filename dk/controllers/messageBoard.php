<?php
class MessageBoard extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index(){
        
        $this->view->messageBoardPosts = $this->dbmodel->messageBoardPosts();
        $this->view->messageBoardComments = $this->dbmodel->messageBoardComments();
     
        $this->view->render('messageboard/index');
    }
}
?>
