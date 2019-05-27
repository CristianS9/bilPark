<?php
    class administrar extends CI_Controller{

          
        public function index(){
            $this->load->model("Usuario_Model");
            $this->Usuario_Model->restringirLogin();
            $this->Usuario_Model->restringirAdmin();

            $this->load->helper("url");
            $this->load->library("session");
            $this->load->model("Aparcamiento_Model");
            $data["aparcamientos"] = $this->Aparcamiento_Model->getAparcamientos();
            
            $this->load->view("administrar/administrar",$data);
        }

    }


?>