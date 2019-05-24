<?php
    class home extends CI_Controller{
        
        public function index(){
            $this->load->helper("url");
            $this->load->library("session");
            
            $this->load->view("home/home");
        }

    }

?>