<?php
class View {

    function __construct() {
    }
    
    public function render($name){
        // main view includes
            require 'views/header.php';
            require 'views/'. $name . '.php';
            require 'views/footer.php';                   
    }

}
?>
