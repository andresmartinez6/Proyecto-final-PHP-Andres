<?php

    class usuario{

        private $bd;
        private $usuario;


        public function __contruct(){
            $this->bd=conectar::conexion();
        }

        //INSERTAR NUEVO USUARIO
        public function insertar_usuario($nombre,$pass){

            $contraseña_encriptada=md5(md5(md5($pass)));

            $sentencia="INSERT INTO usuarios VALUES(null,?,?)";

            $consulta=$this->bd->prepare($sentencia);
            $consulta->bind_param("ss",$nombre,$contraseña_encriptada);
            $consulta->execute();
            $consulta->close();

        }


        //MODIFICAR USUARIO
        public function modificar_usuario($id,$nombre,$pass){

            $contraseña_encriptada=md5(md5(md5($pass)));

            $sentencia="UPDATE usuarios SET nombre = ?, pass = ?
                        WHERE id = ?";

            $consulta = $this->bd->prepare($sentencia);
            $consulta->bind_param("iss",$id, $nombre,$contraseña_encriptada);
            $consulta->execute();
            $consulta->close();

        }


        //BUSCAR USUARIOS POR NOMBRE
        public function buscar_usuario($nombre){

            $sentencia="SELECT * FROM usuarios WHERE nombre LIKE ?";

            $consulta=$this->bd->prepare($sentencia);
            $nombre_busqueda="%{$nombre}%";
            $consulta->bind_param("s",$nombre_busqueda);
            $consulta->execute();

            $resultado=$consulta->get_result();
            $usuario=$resultado->fetch_all(MYSQLI_ASSOC);

            $consulta->close();
            return $usuario;

        }


        //LISTAR USUARIOS
        public function listar_usuarios(){
            $sentencia="SELECT * 
                        FROM socios
                        WHERE activo='1' ";
    
            $consulta=$this->bd->query($sentencia);
            $socios=$consulta->fetch_all(MYSQLI_ASSOC);
            $consulta->close();            
            return $socios;
                
        }
        

    }

?>