<?php

    class juego{

        private $bd;
        private $juego;

        public function __construct(){
            $this->bd=conectar::conexion();
        }

        //INSERTAR JUEGOS
        public function insertar_juego($id,$titulo,$plataforma,$anio,$foto,$duenio){

            $sentencia="INSERT INTO juegos (id,titulo,plataforma,anio,foto,duenio) VALUES (?,?,?,?,?,?)";

            $consulta=$this->bd->prepare($sentencia);
            $consulta->bind_param("issysi",$id,$titulo,$plataforma,$anio,$foto,$duenio);
            $consulta->execute();
            $consulta->close();

        }

        //LISTAR JUEGOS
        public function listar_juego(){

            $sentencia="SELECT * FROM juegos WHERE id>=0";

            $consulta=$this->bd->query($sentencia);
            $juego=$consulta->fetch_all(MYSQLI_ASSOC);
            $consulta->close();

            return $juego;

        }

        //BUSCAR JUEGO
        public function buscar_juego($nombre){

            $sentencia="SELECT * FROM juegos WHERE nombre=?";

            $consulta=$this->bd->prepare($sentencia);
            $busqueda_juego="%{$nombre}%";
            $consulta->bind_param("s",$busqueda_juego);
            $consulta->execute();

            
            $resultado=$consulta->get_result();
            $juego=$resultado->fetch_all(MYSQLI_ASSOC);
        
            $consulta->close();
        
            return $juego;

        }

    }

?>