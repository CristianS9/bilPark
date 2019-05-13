<?php
    class home extends CI_Controller{
        
        public function index(){
            $this->load->helper("url");
            $this->load->view("home/home");
        }

    }

?>