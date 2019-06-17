<?php
class EmployeeList extends Controller{

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->view->employees = $this->dbmodel->employeeList();
        $this->view->render('emplist/index');
    }

}
?>
