<?php
session_start();
class SavePost extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        
        $postTitle = $_POST['postTitle'];
        $postText = $_POST['postText'];
        $username = $_SESSION['user'];
        
        $this->dbmodel->createPost($username, $postText, $postTitle );
        
        
        $this->view->messageBoardPosts = $this->dbmodel->messageBoardPosts();
        $this->view->messageBoardComments = $this->dbmodel->messageBoardComments();
        $this->view->render('messageboard/index');
    }

}
?>
