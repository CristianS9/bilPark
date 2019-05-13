<?php
    class login extends CI_Controller{
        public function nombreUsuarioDisponible(){
            $this->load->model("Usuario_Model");


            $nombre = $this->input->post("nombre");

            $existe = $this->Usuario_Model->nombreUsuarioDisponible($nombre);


           echo $existe;
        }
    }



?>