<?php 
	include "conexion.php";
	$conexion=conexion();

	$sql="SELECT * from t_persona";
	$result=$conexion->query($sql);

	$tabla="";

	while($datos=$result->fetch_assoc()){
		$tabla=$tabla.'<tr>
		<td>'.$datos['id'].'</td>
		<td>'.$datos['nombre'].'</td>
		<td>'.$datos['paterno'].'</td>
		<td>'.$datos['materno'].'</td>
		<td>'.$datos['curso'].'</td>
		<td>'.$datos['telefono'].'</td>
		<td>
        <span class="btn btn-warning btn-sm" data-toggle="modal"
         data-target="#modalActualizar" onclick="agregaDatosParaEdicion('.$datos['id'].')">
		<i class="fas fa-edit"></i>
		</span>
		</td>
		<td>
		<span class="btn btn-danger btn-sm" onclick="eliminarDatos('.$datos['id'].')">
		<i class="fas fa-trash-alt"></i>
		</span>
		</td>
		</tr>';
	}

	$conexion->close();

	echo '<table class="table table-stripped">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido paterno</th>
					<th>Apellido materno</th>
					<th>Curso</th>
					<th>Telefono</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>'.$tabla.'
				</tbody>';
