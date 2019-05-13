<?php

class Home extends CI_Controller {
    
    
    public function test() {
        echo "this is a test method for the view controler";
    }
    
        public function index() {
        
        $data["main_view"] = "home_view";
        
        $this->load->view('layouts/main', $data);
    }
}


?>
