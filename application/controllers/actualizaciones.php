<?php
    class actualizaciones extends CI_Controller{

        public function index(){

            $this->load->helper("url");
    


            $this->load->view("actualizaciones/actualizaciones");
        }

    }


?>