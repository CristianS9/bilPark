<?php
    class login extends CI_Controller{
        public function nombreUsuarioExiste(){
            $this->load->model("Usuario_Model");


            $nombre = $this->input->post("nombre");

            $existe = $this->Usuario_Model->nombreUsuarioExiste($nombre);


           echo $existe;
        }
    }



?>