<?php

    class Prestamos{

        private $bd;
        private $prestamo;


        public function __construct(){
            $this->bd = conectar::conexion();
        }


        //INSERTAR PRESTAMOS
        public function insertar_prestamo($id_amigo, $id_juego, $fecha_prestamo){

            $sentencia="INSERT INTO prestamos(id_amigo,id_juego,fecha_prestamo,devuelto)
                        VALUES(?, ?, ?,'n')";
            
            $consulta=$this->bd->prepare($sentencia);
            $consulta->bind_param("iis", $id_amigo, $idJuego, $fechaPrestamo);
            $consulta->execute();
            $consulta->close();
        }


        //ACTUALIZAR PRESTAMOS DEVUELTOS
        public function actualizar_prestamo_devuelto($id_prestamo) {

            $sentencia="UPDATE prestamos SET devuelto='s' WHERE id=?";
            
            $consulta=$this->bd->prepare($sentencia);
            $consulta->bind_param("i", $id_prestamo);
            $consulta->execute();
            $consulta->close();
        }


        //LISTAR TODOS LOS PRESTAMOS
        public function listar_prestamos() {
            $sentencia="SELECT * FROM prestamos";
            
            $resultado=$this->bd->query($sentencia);
            $prestamos=$resultado->fetch_all(MYSQLI_ASSOC);
            $resultado->close();

            return $prestamos;
        }


        //BUSCAR PRESTAMOS
        public function buscar_prestamo($nombre_amigo){

            $sentencia="SELECT amigos.nombre,juegos.titulo FROM prestamos,juegos,amigos WHERE juegos.id=prestamos.id_juego
                                                                                        and amigos.id=prestamos.id_amigo";
            
            $consulta=$this->bd->prepare($sentencia);
            $busqueda="%{$nombre_amigo}%";
            $consulta->bind_param("s",$busqueda);
            $consulta->execute();

            $resultado=$consulta->get_result();
            $prestamo=$resultado->fetch_all(MYSQLI_ASSOC);

            $consulta->close();

            return $prestamo;

        }

        
    }

?>