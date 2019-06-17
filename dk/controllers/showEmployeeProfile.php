<?php
//session_start();
class ShowEmployeeProfile extends Controller {

    function __construct() {
        parent::__construct();        
    }

    function index($username){
        $this->view->employeeData = $this->dbmodel->showEmployee($username);
        $this->view->reqUser = $username;
        $this->view->render('empprofile/index');
    }
    
    function showProfile($username){
        $this->view->employeeData = $this->dbmodel->showEmployee($username);
        $this->view->reqUser = $username;
        $this->view->render('empprofile/index');
    }
}
?>
