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
        public function emailExiste($email){
            $this->load->database();

            $res = $this->db->get_where("usuarios",["email"=>$email])->row("usuario");
             if(gettype($res)=="string"){
                return 1;
            } else {
                return 0;
            }
           
        }
        public function registrar($usuario,$contrasena,$rcontrasena,$email,$remail,$nombre,$apellidos,$telefono){
            $correcto = true;

            // Estas funciones son por protocolo y solo devuelven correcto o falso, ya que las comprobaciones se han hecho en JS 
            // En ningun momento se puede acceder aqui sin el JS
            // Si alguna de estas comprobaciones salta significa que alguien esta manipulando el JS de la pagina por lo tanto no necesita una respuesta adecuada

            if(strlen($usuario)<4 || strlen($contrasena)<5 || strlen($email)<6 || strlen($nombre)<4 || strlen($apellidos)<4 || strlen($telefono)<5){
                // Laos valor son menos de lo que deberian
                $correcto = false;
            }else if(strlen($usuario)>25 || strlen($contrasena)>50 || strlen($email)>50 || strlen($nombre)>50 || strlen($apellidos)>50 || strlen($telefono)>15){
                // Los valor eson demasiado largos
                $correcto = false;
            } else if($contrasena!=$rcontrasena || $email != $remail){
                // Las contraseñas o los emails no coinciden
                $correcto = false;
            } else if($this->nombreUsuarioExiste($usuario)==1 || $this->emailExiste($email)==1){
                // El nombre de usuario o el email ya estan en uso
                $correcto = false;
            } else if( preg_match("/^\S*(?=\S{4,})(?=\S*[a-z])(?=\S*[\W])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$contrasena) !=1
                || preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$email) !=1){
                // La contraseña o el correo no cumplen con el formato necesario
                $correcto = false;                
            } else if(preg_match('/^\d+$/',$telefono)!=1){
                // El numero de telefono contien letras
                $correcto = false;
            }

            if($correcto){
                try {
                    $this->load->database();
                    $this->db->insert("usuarios",[
                        "usuario"=>$usuario,
                        "nombre"=>$nombre,
                        "apellidos"=>$apellidos,
                        "email"=>$email,
                        "contrasena"=>password_hash($contrasena,PASSWORD_BCRYPT),
                        "telefono"=>$telefono
                    ],);
                    return 1;
                } catch (Throwable $err) {
                    return $err;
                }

            }else {
                return 0;
            }
            
        }

        public function login($usuario,$contrasena){
            
            try {
                $this->load->database();
                $datos_usuario = $this->db->get_where("usuarios",["usuario"=>$usuario]);
                $contrasaena_original = $datos_usuario->row("contrasena");
                
                if(password_verify($contrasena,$contrasaena_original)){
                        $this->load->library("session");
                        $id= $datos_usuario->row("id");
                        
                        $this->session->set_userdata("id",$id);
                        $this->session->set_userdata("usuario",$usuario);
                        
                        return 0;
                } else {
                    return 2;
                }
            } catch (Throwable $th) {
                return $th;
            }
        }
        public function logout(){
            try {
                 $this->load->library("session");
                $this->session->unset_userdata("id");
                $this->session->unset_userdata("usuario");
                return 0;
            } catch (Throwable $th) {
                return 1;
            }
        }
        
    }

?>