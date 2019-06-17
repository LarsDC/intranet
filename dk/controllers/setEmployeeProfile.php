<?php
session_start();
class SetEmployeeProfile extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $description = $_POST['descriptionText'];
        $user = $_POST['user'];
        $this->dbmodel->setEmployeeProfile($description, $user);
        $this->view->filePath = $this->dbmodel->savePicture($user);
        //$this->dbmodel->savePicturePath($filePath, $user);
        $this->view->employeeData = $this->dbmodel->showEmployee($user);
        $this->view->reqUser = $user;
        $this->view->render('empprofile/index');
    }

}
?>
