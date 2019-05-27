<?php
    class administrar extends CI_Controller{

        public function nombreUsuarioExiste(){
            $this->load->model("Usuario_Model");

            $nombre = $this->input->post("nombre");
            $existe = $this->Usuario_Model->nombreUsuarioExiste($nombre);


           echo $existe;
        }
        public function eliminarAparcamiento(){
            $this->load->model("Aparcamiento_Model");

            $id = $this->input->post("id");
            $res = $this->Aparcamiento_Model->eliminarAparcamiento($id);

            echo $res;

        }
      
    }



?>