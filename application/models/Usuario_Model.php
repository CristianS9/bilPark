<?php
    class Usuario_Model extends CI_Model{


        public function nombreUsuarioExiste($nombre){
            $this->load->database();

            $res = $this->db->get_where("usuarios",["usuario"=>$nombre])->row("usuario");
            if(gettype($res)=="string"){
                return 1;
            } else {
                return 0;
            }
           
        }
    }

?>