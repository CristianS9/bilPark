<?php
    class reservar extends CI_Controller{

        public function datosAparcamiento(){
            $this->load->model("Aparcamiento_Model");

            $id = $this->input->post("id");
            $aparcamiento = $this->Aparcamiento_Model->getAparcamiento($id);


           echo json_encode($aparcamiento[0]);
        }
        public function reservarAparcamiento(){
            $this->load->model("Aparcamiento_Model");


            $res = $this->Aparcamiento_Model->reservar(
                $this->input->post("id"),
                $this->input->post("hora_inicio"),
                $this->input->post("hora_fin"),
                $this->input->post("num")
            );
            
            echo $res;
        }
      
    }



?>