<?php
    class Usuario_Model extends CI_Model{


        public function nombreUsuarioDisponible($nombre){
            $this->load->database();

            $res = $this->db->get_where("usuarios",["usuario"=>$nombre])->row("usuario");
            if(gettype($res)=="string"){
                return 0;
            } else {
                return 1;
            }
           
        }
    }

?>