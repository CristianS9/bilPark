<?php
    class reservar extends CI_Controller{
        
        public function index(){
            $this->load->helper("url");
            $this->load->library("session");
            
            $this->load->model("Zona_Model");
            $this->load->model("Aparcamiento_Model");
            
            $data["aparcamientos"] = $this->Aparcamiento_Model->getAparcamientos();
            $data["zonas"] = $this->Zona_Model->getZonas();
    
     

            $this->load->view("reservar/reservar",$data);
        }

    }

?>