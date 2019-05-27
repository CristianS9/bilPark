<?php
    class empresas extends CI_Controller{

          
        public function index(){
            
            $this->load->helper("url");
            $this->load->library("session");
            $this->load->model("Usuario_Model");
        
            $this->load->view("empresas/empresas");



        }

    }


?>