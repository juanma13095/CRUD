<?php
   include "conexion.php";
    $conexion=conexion();


      //Este es el que te decía Carlos según es para ponerle el md5 pero no sé si puedo hacerlo de esta manera
      $datos= array(
        $conexion->real_escape_string(htmlentities($_POST['nombre'])),
        $conexion->real_escape_string(htmlentities($_POST['paterno'])), 
        $conexion->real_escape_string(htmlentities($_POST['materno'])), 
        $conexion->real_escape_string(htmlentities($_POST['curso'])), 
        $conexion->real_escape_string(htmlentities($_POST['telefono']))
    
      );
 
      $sql="INSERT into t_persona (nombre,
                                    paterno,
                                    materno,
                                    curso,
                                    telefono)
                                    values (?,?,?,?,?)";
    $query=$conexion->prepare($sql);
    $query->bind_param('sssss',$datos[0], $datos[1], $datos[2], $datos[3], $datos[4]);

    echo $query->execute();
    $query->close(); 


?>