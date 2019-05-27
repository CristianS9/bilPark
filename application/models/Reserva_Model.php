
<?php
    class Reserva_Model extends CI_Model{

        public function getReservasUsuario($id){
            try {
                $this->load->database();
                $reservas = $this->db->query("CALL `spGetReservasUsuario`($id);")->result();
                $this->db->close();
                
                return $reservas;
            } catch (\Throwable $err) {
                return $err;
            }
        }
        public function eliminarReserva($id){
            $this->load->database();
            try {
                $this->db->where("id",$id);
                $this->db->delete("reservas");
                $this->db->close();
                return 0;
            } catch (Throwable $err) {
                return 1;
            }
        }
   
    }

?>