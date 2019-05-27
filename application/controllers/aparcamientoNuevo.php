<?php
    class aparcamientoNuevo extends CI_Controller{

          
        public function index(){
            $this->load->model("Usuario_Model");
            $this->Usuario_Model->restringirLogin();
            $this->Usuario_Model->restringirAdmin();


               $this->load->helper("url");
            $this->load->library("session");
            $this->load->model("Zona_Model");
            
            $nombre = $this->input->post("nombre");
            $precio = $this->input->post("precio");
            $numPlazas = $this->input->post("numPlazas");
            $zona = $this->input->post("zona");
            $posX = $this->input->post("posX");
            $posY = $this->input->post("posY");

            if(
                $nombre!=""
                && $precio !=""
                && $numPlazas !=""
                && $zona !=""
                && $posX !=""
                && $posY !=""
            ){
                $this->load->model("Aparcamiento_Model");
                $res = $this->Aparcamiento_Model->addAparcamiento($nombre,$precio,$numPlazas,$zona,$posX,$posY);
                
            
                if("err"!=$res){
                    redirect("administrar");
                }  
            } else {
                
                $data["zonas"] = $this->Zona_Model->getZonas();
                
                $this->load->view("administrar/aparcamientoNuevo",$data);
            }

            

        }

    }


?>