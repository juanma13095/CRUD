function mostrarDatos() {
    $.ajax({
        url: "php/mostrarDatos.php",
        success: function (r) {
            $('#tablaDatos').html(r);
        }
    });
}
function agregarDatos() {
    if ($('#nombre').val() == "") {
        swal("Debes agregar un nombre!!");
        return false;
    }
    $.ajax({
        type: "POST",
        data: $('#frmAgregarDatos').serialize(),
        url: "php/agregarDatos.php",
        success: function (r) {
            if (r == 1) {
                $('#frmAgregarDatos')[0].reset();
                swal("", "Agregado correctamente", "success");
                mostrarDatos();
            } else {
                swal("", "fallo", "error");
            }
        }
    });
}



function eliminarDatos(idNombre) {
    swal({
        title: "Estás seguro de eliminar el dato?",
        text: "Una vez eliminado no podras recuperar el dato!!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    data: "id=" + idNombre,
                    url: "php/eliminar.php",
                    success: function (r) {
                        if (r == 1) {
                            swal("", "eliminado correctamente", "success");
                            mostrarDatos();
                        } else {
                            swal("", "fallo al eliminar", "error");
                        }
                       
                    }
                });
            }
        });

}

function agregaDatosParaEdicion(id) {
    $.ajax({
        type: "POST",
        data: "id=" + id,
        url: "php/datosUpdate.php",
        success: function (r) {
            datos = jQuery.parseJSON(r);

            $('#idu').val(datos['id']);
            $('#nombreu').val(datos['nombre']);
            $('#paternou').val(datos['paterno']);
            $('#maternou').val(datos['materno']);
            $('#cursou').val(datos['curso']);
            $('#telefonou').val(datos['telefono']);
        }
    });
}

function actualizarDatos() {
    if ($('#nombreu').val() == "") {
        swal("Debes agregar un nombre!!");
        return false;
    }
    $.ajax({
        type: "POST",
        data: $('#frmAgregarDatosu').serialize(),
        url: "php/actualizarDatos.php",
        success: function (r) {
            if (r == 1) {
                mostrarDatos();
                swal("", "Actualizado correctamente", "success");
            } else {
                swal("", "fallo al actualizar", "error");
            }
        }
    });

}