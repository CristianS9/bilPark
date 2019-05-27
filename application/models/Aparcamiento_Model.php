<?php
    class Aparcamiento_Model extends CI_Model{
        
        public function addAparcamiento($nombre,$precio,$numPlazas,$zona,$posX,$posY){

            // Quita todos los puntos por si esta escrito en miles
            $precio = str_replace(".","",$precio);
            
            // Cambia las comas por puntos
            $precio = str_replace(",",".",$precio);
            try {
                $this->load->database();
                $id = $this->db->query("CALL spNuevoAparcamiento(\"$nombre\",'$precio',$numPlazas,$zona,'$posX','$posY')")->row("id");
                $this->db->close();
                return $id;
            } catch (Throwable $err) {
                return "err";
            }
        }
        public function getAparcamientos(){
            $this->load->database();
            $aparcamientos = $this->db->query("CALL spGetAparcamientos()")->result();
            $this->db->close();
            return $aparcamientos;
        }
        
        public function eliminarAparcamiento($id){
            $this->load->database();
            try {
                $this->db->where("id",$id);
                $this->db->delete("aparcamientos");
                $this->db->close();
                return 0;
            } catch (Throwable $err) {
                return 1;
            }
        }
        public function getAparcamiento($id){
            $this->load->database();
            try {
                $aparcamiento = $this->db->query("CALL spGetAparcamiento($id);")->result();
                $this->db->close();
                return $aparcamiento;
            } catch (Throwable $err) {
                return 0;
            }
        }
        public function reservar($id,$inicio,$fin,$num){
            try {
                $this->load->database();
                $string = $this->db->query("CALL `spPlazasDisponibles`($num,'$inicio',$id);")->row("string");
                $this->db->close();
                // Obtener array de reservas
                $datos = explode("<aa>",$string);
                array_splice($datos, 0, 1);
                array_splice($datos,count($datos)-1, 1);

                // Separar los datos
                $limite = $datos[0];
                array_splice($datos, 0, 1);

                $libre = 0;
                for ($i=0; $i <count($datos); $i++) { 
                    $reservados = $datos[$i];
                    if($reservados>=$limite){
                        $libre = 1;
                    }
                }
 
                if(0==$libre){
                    return $this->insertReserva($id,$inicio,$fin,$num);
                } else {
                    return 2;
                } 
               
                
            
            } catch (Throwable $err) {
                return $err;
            }
        }
        public function insertReserva($id,$inicio,$fin,$num){
            try {
                $this->load->library("session");
                $this->load->database();
                $usuario = $this->session->id;
                $this->db->insert("reservas",[
                            "aparcamiento"=>$id,
                            "hora_entrada"=>$inicio,
                            "hora_salida"=>$fin,
                            "usuario"=>$usuario                    
                        ]);
                return 0;
            } catch (Throwable $err) {
                return $err;
            }
        }
    }


?>