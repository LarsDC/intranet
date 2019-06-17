<?php
class MyData extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function getEmployeeData($username){
        $this->view->employeeData = $this->dbmodel->getEmployeeData($username);
        $this->view->render('mydata/index');
    }

}
?>
