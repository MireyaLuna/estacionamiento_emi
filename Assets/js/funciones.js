let tblUsuarios, tblVehiculos, tblClientes, tblPuntos, tblEstacionamientos, myModal;
document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById('my_modal')) {
        myModal = new bootstrap.Modal(document.getElementById('my_modal'));
    }
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc: ''
        },
        columns: [{
            'data': 'id',
        }, {
            'data': 'usuario',
        }, {
            'data': 'nombre',
        }, {
            'data': 'genero',
        }, {
            'data': 'cargo',
        }, {
            'data': 'fecha_creacion',
        }, {
            // 'data': 'usuario_creacion',
            // }, {
            'data': 'fecha_modificacion',
        }, {
            // 'data': 'usuario_modificador',
            // }, {
            'data': 'estado',
        }, {
            'data': 'acciones',
        }]
    });
    tblVehiculos = $('#tblVehiculos').DataTable({
        ajax: {
            url: base_url + "Vehiculos/listar",
            dataSrc: ''
        },
        columns: [{
            'data': 'id',
        }, {
            'data': 'placa',
        }, {
            'data': 'color',
        }, {
            'data': 'marca',
        }, {
            'data': 'id_espacio',
        }, {
            'data': 'fecha_creacion',
        }, {
            // 'data': 'usuario_creacion',
            // }, {
            'data': 'fecha_modificacion',
        }, {
            // 'data': 'usuario_modificador',
            // }, {
            'data': 'estado',
        }, {
            'data': 'acciones',
        }]
    });
    tblClientes = $('#tblClientes').DataTable({
        ajax: {
            url: base_url + "Clientes/listar",
            dataSrc: ''
        },
        columns: [{
            'data': 'id',
        }, {
            'data': 'nombre',
        }, {
            'data': 'ci',
        }, {
            'data': 'telefono',
        }, {
            'data': 'fecha_creacion',
        }, {
            // 'data': 'usuario_creacion',
            // }, {
            'data': 'fecha_modificacion',
        }, {
            // 'data': 'usuario_modificador',
            // }, {
            'data': 'estado',
        }, {
            'data': 'acciones',
        }]
    });
    tblPuntos = $('#tblPuntos').DataTable({
        ajax: {
            url: base_url + "Puntos/listar",
            dataSrc: ''
        },
        columns: [{
            'data': 'id',
        }, {
            'data': 'nombre',
        }, {
            'data': 'descripcion',
        }, {
            'data': 'id_estacionamiento',
        }, {
            'data': 'fecha_creacion',
        }, {
            // 'data': 'usuario_creacion',
            // }, {
            'data': 'fecha_modificacion',
        }, {
            // 'data': 'usuario_modificador',
            // }, {
            'data': 'estado',
        }, {
            'data': 'acciones',
        }]
    });
    tblEstacionamientos = $('#tblEstacionamientos').DataTable({
        ajax: {
            url: base_url + "Estacionamientos/listar",
            dataSrc: ''
        },
        columns: [{
            'data': 'id',
        }, {
            'data': 'nombre',
        }, {
            'data': 'ubicacion',
        }, {
            'data': 'fecha_creacion',
        }, {
            // 'data': 'usuario_creacion',
            // }, {
            'data': 'fecha_modificacion',
        }, {
            // 'data': 'usuario_modificador',
            // }, {
            'data': 'estado',
        }, {
            'data': 'acciones',
        }]
    });
})

function frmLogin(e) {
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const clave = document.getElementById("clave");
    if (usuario.value == "") {
        clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    } else if (clave.value == "") {
        usuario.classList.remove("is-invalid");
        clave.classList.add("is-invalid");
        clave.focus();
    } else {
        const url = base_url + "Usuarios/validar";
        const frm = document.getElementById("frmLogin");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res == "ok") {
                    window.location = base_url + "Usuarios";
                } else {
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").textContent = res;
                }
            }
        }
    }
}

function frmUsuario() {
    document.getElementById("tituloModal").textContent = "Registrar usuario";
    document.getElementById("btnAccion").textContent = "Registrar";
    document.getElementById("claves").classList.remove('d-none');
    document.getElementById("frmUsuario").reset();
    myModal.show();
    document.getElementById("id").value = "";
}

function registrarUsuario(e) {
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const clave = document.getElementById("clave");
    const confirmar = document.getElementById("confirmar");
    const genero = document.getElementById("genero");
    const cargo = document.getElementById("cargo");
    if (usuario.value == "" || nombre.value == "" || genero.value == "" || cargo.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
    } else if (clave.value != confirmar.value) {
        alertas('Las contraseñas no coinciden', 'warning');
    } else {
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                frm.reset();
                myModal.hide();
                tblUsuarios.ajax.reload();
            }
        }
    }
}

function btnEditarUsuario(id) {
    document.getElementById("tituloModal").textContent = "Actualizar usuario";
    document.getElementById("btnAccion").textContent = "Modificar";
    const url = base_url + "Usuarios/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            // if (res=='') {
            //     alertas("No tiene permiso de realizar esta accion", "warning");
            // } else {
            document.getElementById("id").value = res.id;
            document.getElementById("usuario").value = res.usuario;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("genero").value = res.genero;
            document.getElementById("cargo").value = res.cargo;
            document.getElementById("claves").classList.add('d-none');
            myModal.show();
            tblUsuarios.ajax.reload();
            // }
        }
    }

}

function btnEliminarUsuario(id) {
    // alert(id);
    Swal.fire({
        title: '¿Esta seguro de la eliminacion?',
        text: "El usuario no se eliminara de forma permanente, solo cambia a estado inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == '') {
                        alertas('No tiene permiso de eliminar', 'warning');
                    } else {
                        alertas(res.msg, res.icono);
                        tblUsuarios.ajax.reload();
                    }
                }
            }

        }
    })
}

function btnReingresarUsuario(id) {
    Swal.fire({
        title: '¿Estas seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == '') {
                        alertas("No tiene permiso de realizar esta accion", "warning");
                    } else {
                        tblUsuarios.ajax.reload();
                        alertas(res.msg, res.icono);
                    }
                }
            }

        }
    })
}
//--------------------------------------------------------
function frmVehiculo() {
    document.getElementById("tituloModal").textContent = "Registrar vehiculo";
    document.getElementById("btnAccion").textContent = "Registrar";
    document.getElementById("frmVehiculo").reset();
    myModal.show();
    document.getElementById("id").value = "";
}

function registrarVehiculo(e) {
    e.preventDefault();
    const placa = document.getElementById("placa");
    const color = document.getElementById("color");
    const marca = document.getElementById("marca");
    const cliente = document.getElementById("id_cliente");
    const espacio = document.getElementById("id_espacio");

    if (placa.value == "" || color.value == "" || marca.value == "" || cliente.value == "" || espacio.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Vehiculos/registrar";
        const frm = document.getElementById("frmVehiculo");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                frm.reset();
                myModal.hide();
                tblVehiculos.ajax.reload();
            }
        }
    }
}

function btnEditarVehiculo(id) {
    document.getElementById("tituloModal").textContent = "Actualizar vehiculo";
    document.getElementById("btnAccion").textContent = "Modificar";
    const url = base_url + "Vehiculos/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("placa").value = res.placa;
            document.getElementById("color").value = res.color;
            document.getElementById("marca").value = res.marca;
            document.getElementById("id_cliente").value = res.id_cliente;
            document.getElementById("id_espacio").value = res.id_espacio;
            myModal.show();
            console.log(res)
            tblVehiculos.ajax.reload();
        }
    }

}

function btnEliminarVehiculo(id) {
    Swal.fire({
        title: '¿Esta seguro de la eliminacion?',
        text: "El usuario no se eliminara de forma permanente, solo cambia a estado inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Vehiculos/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == '') {
                        alertas('No tiene permiso de eliminar', 'warning');
                    } else {
                        alertas(res.msg, res.icono);
                        tblVehiculos.ajax.reload();
                    }
                }
            }

        }
    })
}

function btnReingresarVehiculo(id) {
    Swal.fire({
        title: '¿Estas seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Vehiculos/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == '') {
                        alertas("No tiene permiso de realizar esta accion", "warning");
                    } else {
                        tblVehiculos.ajax.reload();
                        alertas(res.msg, res.icono);
                    }
                }
            }

        }
    })
}

//--------------------------------------------------------
function frmCliente() {
    document.getElementById("tituloModal").textContent = "Registrar cliente";
    document.getElementById("btnAccion").textContent = "Registrar";
    document.getElementById("frmCliente").reset();
    myModal.show();
    document.getElementById("id").value = "";
}

function registrarCliente(e) {
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const ci = document.getElementById("ci");
    const telefono = document.getElementById("telefono");

    if (nombre.value == "" || ci.value == "" || telefono.value == "" ) {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Clientes/registrar";
        const frm = document.getElementById("frmCliente");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                frm.reset();
                myModal.hide();
                tblClientes.ajax.reload();
            }
        }
    }
}

function btnEditarCliente(id) {
    document.getElementById("tituloModal").textContent = "Actualizar cliente";
    document.getElementById("btnAccion").textContent = "Modificar";
    const url = base_url + "Clientes/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("ci").value = res.ci;
            document.getElementById("telefono").value = res.telefono;
            myModal.show();
            console.log(res)
            tblClientes.ajax.reload();
        }
    }

}

function btnEliminarCliente(id) {
    Swal.fire({
        title: '¿Esta seguro de la eliminacion?',
        text: "El cliente no se eliminara de forma permanente, solo cambia a estado inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Clientes/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == '') {
                        alertas('No tiene permiso de eliminar', 'warning');
                    } else {
                        alertas(res.msg, res.icono);
                        tblClientes.ajax.reload();
                    }
                }
            }

        }
    })
}

function btnReingresarCliente(id) {
    Swal.fire({
        title: '¿Estas seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Clientes/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == '') {
                        alertas("No tiene permiso de realizar esta accion", "warning");
                    } else {
                        tblClientes.ajax.reload();
                        alertas(res.msg, res.icono);
                    }
                }
            }

        }
    })
}
//--------------------------------------------------------
function frmEstacionamiento() {
    document.getElementById("tituloModal").textContent = "Registrar estacionamiento";
    document.getElementById("btnAccion").textContent = "Registrar";
    document.getElementById("frmEstacionamiento").reset();
    myModal.show();
    document.getElementById("id").value = "";
}

function registrarEstacionamiento(e) {
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const ubicacion = document.getElementById("ubicacion");

    if (nombre.value == "" || ubicacion.value == "" ) {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Estacionamientos/registrar";
        const frm = document.getElementById("frmEstacionamiento");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                console.log(res);
                alertas(res.msg, res.icono);
                frm.reset();
                myModal.hide();
                tblEstacionamientos.ajax.reload();
            }
        }
    }
}

function btnEditarEstacionamiento(id) {
    document.getElementById("tituloModal").textContent = "Actualizar estacionamiento";
    document.getElementById("btnAccion").textContent = "Modificar";
    const url = base_url + "Estacionamientos/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("ubicacion").value = res.ubicacion;
            myModal.show();
            console.log(res)
            tblEstacionamientos.ajax.reload();
        }
    }
}

function btnEliminarEstacionamiento(id) {
    Swal.fire({
        title: '¿Esta seguro de la eliminacion?',
        text: "El estacionamiento no se eliminara de forma permanente, solo cambia a estado inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Estacionamientos/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == '') {
                        alertas('No tiene permiso de eliminar', 'warning');
                    } else {
                        alertas(res.msg, res.icono);
                        tblEstacionamientos.ajax.reload();
                    }
                }
            }

        }
    })
}

function btnReingresarEstacionamiento(id) {
    Swal.fire({
        title: '¿Estas seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Estacionamientos/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == '') {
                        alertas("No tiene permiso de realizar esta accion", "warning");
                    } else {
                        tblEstacionamientos.ajax.reload();
                        alertas(res.msg, res.icono);
                    }
                }
            }

        }
    })
}
function alertas(mensaje, icono) {
    Swal.fire({
        position: 'top-end',
        icon: icono,
        title: mensaje,
        showConfirmButton: false,
        timer: 2000
    })
}