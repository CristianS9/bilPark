<?php
    class acceso extends CI_Controller{

        public function nombreUsuarioExiste(){
            $this->load->model("Usuario_Model");

            $nombre = $this->input->post("nombre");
            $existe = $this->Usuario_Model->nombreUsuarioExiste($nombre);


           echo $existe;
        }

        public function emailExiste(){
            $this->load->model("Usuario_Model");

            $email = $this->input->post("email");
            $existe = $this->Usuario_Model->emailExiste($email);

            echo $existe;
        }
        public function registrar(){
            $this->load->model("Usuario_Model");

            $res = $this->Usuario_Model->registrar(
                $this->input->post("usuario"),
                $this->input->post("contrasena"),
                $this->input->post("rcontrasena"),
                $this->input->post("email"),
                $this->input->post("remail"),
                $this->input->post("nombre"),
                $this->input->post("apellidos"),
                $this->input->post("telefono")
            );

            echo $res;

        }
    }



?>