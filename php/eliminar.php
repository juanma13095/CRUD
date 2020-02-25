<?php
    include "conexion.php";
    $conexion=conexion();
    $id=$conexion->real_escape_string(htmlentities($_POST['id']));

$sql="DELETE from t_persona where id=?";
$query=$conexion->prepare($sql);
$query->bind_param("i",$id);
echo $query->execute();
$query->close();

?>