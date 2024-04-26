<?php

    class amigo{

        private $bd;
        private $amigo;

        public function __construct(){
            $this->bd=conectar::conexion();
        }

        //INSERTAR NUEVO AMIGO
        public function insertar_amigo($id,$dueño,$nombre,$apellidos,$fecha_nac){

            $sentencia="INSERT INTO amigos(id,dueño,nombre,apellidos,fecha_nac) VALUES (?,?,?,?,?)";

            $consulta=$this->bd->prepare($sentencia);
            $consulta->bind_param("iissd",$id,$dueño,$nombre,$apellidos,$fecha_nac);
            $consulta->execute();
            $consulta->close();
        }

        //LISTAR TODOS LOS AMIGOS
        public function listar_amigos(){

            $sentencia="SELECT * FROM amigos WHERE id>=0";

            $consulta=$this->bd->query($sentencia);
            $amigos=$consulta->fetch_all(MYSQLI_ASSOC);
            $consulta->close();
            return $amigos;
        }

        //BUSCAR AMIGOS POR NOMBRE Y APELLIDOS
        public function buscar_amigo_nombre_apellidos($nombre,$apellidos){

            $sentencia="SELECT * FROM amigos WHERE nombre=? AND apellidos=?";

            $consulta=$this->bd->prepare($sentencia);
            $nombre_busqueda="%{$nombre}%";
            $apellido_busqueda="%{$apellidos}%";
            $consulta->bind_param("ss",$nombre_busqueda,$apellidos_busqueda);
            $consulta->execute();
            $resultado=$consulta->get_result();

            $amigo=$resultado->fetch_all(MYSQLI_ASSOC);
            $consulta->close();

            return $amigo;

        }


        
        

    }

?>