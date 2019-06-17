<?php
session_start();
class SaveComment extends Controller {

    function __construct() {
        parent::__construct(); 
    }
    
    function index(){
        
        $commentText = $_POST['commentText'];
        $postId = $_POST['postId'];
        $username = $_SESSION['user'];
        
        $this->dbmodel->postComment($commentText, $postId, $username);
        
        
        $this->view->messageBoardPosts = $this->dbmodel->messageBoardPosts();
        $this->view->messageBoardComments = $this->dbmodel->messageBoardComments();
        $this->view->render('messageboard/index');
    }

}

?>
