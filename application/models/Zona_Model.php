<?php
    class Zona_Model extends CI_Model{

        public function getZonas(){
            $this->load->database();

            $res = $this->db->get("zonas")->result();
            $this->db->close();
            $zonas = [];
 
            foreach ($res as $linea){
                    $zonas[] = [
                    "id" => $linea->id,
                    "zona" => $linea->zona
                ]; 
            }
            return $zonas;
        }

    }

?>