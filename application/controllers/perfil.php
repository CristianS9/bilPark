<?php
    class perfil extends CI_Controller{

        public function index(){
            $this->load->model("Usuario_Model");
            $this->load->model("Reserva_Model");
            $this->Usuario_Model->restringirLogin();

            $this->load->helper("url");
            $this->load->library("session");

            $data["perfil"] = $this->Usuario_Model->getPerfil();
            $data["reservas"] = $this->Reserva_Model->getReservasUsuario($this->session->id);


            $this->load->view("perfil/perfil",$data);
        }

    }


?>