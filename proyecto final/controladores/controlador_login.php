<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>controlador_login</title>
</head>
<body>

    <?php
        include("../vistas/vista_login.php");
        require_once("../bd/bd.php");
        require_once("../modelos/modelo_usuario.php");

        if(isset($_POST["aceptar"])){
            
            $contraseña=trim($_POST["pass"]);
            $nombre=trim($_POST["nombre"]);

            if($contraseña!="") {
                $usuario=new usuario();
                $usuario->insertar_usuario($nombre,$contraseña);
            } else {
                echo "No se admiten campos en vacío";
            }
        }
    ?>




</body>
</html>