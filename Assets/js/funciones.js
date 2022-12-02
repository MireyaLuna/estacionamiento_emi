let tblUsuarios, tblVehiculos, tblClientes, tblPuntos, tblEstacionamientos, tblEspacios, tblAdministrador, tblPagos, tblFacturas, myModal;
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
            'data': 'estacionamiento',
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
            'data': 'nombre',
        }, {
            'data': 'tipo',
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
            'data': 'usuario',
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
            'data': 'estacionamiento',
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
    tblEspacios = $('#tblEspacios').DataTable({
        ajax: {
            url: base_url + "Espacios/listar",
            dataSrc: ''
        },
        columns: [{
            'data': 'id',
        }, {
            'data': 'estacionamiento',
        }, {
            'data': 'nro_espacio',
        }, {
            //     'data': 'id_vehiculo',
            // }, {
            //     'data': 'hora_ingreso',
            // }, {
            //     'data': 'hora_salida',
            // }, {
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
    tblAdministrador = $('#tblAdministrador').DataTable({
        ajax: {
            url: base_url + "Administrador/listar",
            dataSrc: ''
        },
        columns: [{
            'data': 'id',
        }, {
            'data': 'nombre',
        }, {
            'data': 'ci',
        }, {
            'data': 'codigo_saga',
        }, {
            'data': 'id_usuario',
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
    tblPagos = $('#tblPagos').DataTable({
        ajax: {
            url: base_url + "Pagos/listar",
            dataSrc: ''
        },
        columns: [{
            'data': 'id',
        }, {
            'data': 'monto',
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
    tblFacturas = $('#tblFacturas').DataTable({
        ajax: {
            url: base_url + "Facturas/listar",
            dataSrc: ''
        },
        columns: [{
            'data': 'id',
        }, {
            'data': 'id_registro',
        }, {
            'data': 'nit',
        }, {
            'data': 'monto_pagado',
        }, {
            //     'data': 'monto_recibido',
            // }, {
            'data': 'fecha_emision',
        }, {
            'data': 'fecha_limite_emision',
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
    const id_estacionamiento = document.getElementById("estacionamiento");
    if (usuario.value == "" || nombre.value == "" || genero.value == "" || cargo.value == "" || id_estacionamiento.value == "") {
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
    const tipo = document.getElementById("tipo");

    if (placa.value == "" || color.value == "" || marca.value == "" || cliente.value == "" || tipo.value == "") {
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
            document.getElementById("tipo").value = res.tipo;
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

    if (nombre.value == "" || ci.value == "" || telefono.value == "") {
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
function frmPuntos() {
    document.getElementById("tituloModal").textContent = "Registrar punto de atencion";
    document.getElementById("btnAccion").textContent = "Registrar";
    document.getElementById("frmPuntos").reset();
    myModal.show();
    document.getElementById("id").value = "";
}

function registrarPunto(e) {
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const descripcion = document.getElementById("descripcion");
    const estacionamiento = document.getElementById("estacionamiento");

    if (nombre.value == "" || descripcion.value == "" || estacionamiento.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Puntos/registrar";
        const frm = document.getElementById("frmPuntos");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                frm.reset();
                myModal.hide();
                tblPuntos.ajax.reload();
            }
        }
    }
}

function btnEditarPunto(id) {
    document.getElementById("tituloModal").textContent = "Actualizar punto de atencion";
    document.getElementById("btnAccion").textContent = "Modificar";
    const url = base_url + "Puntos/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("descripcion").value = res.descripcion;
            document.getElementById("estacionamiento").value = res.id_estacionamiento;
            myModal.show();
            console.log(res)
            tblPuntos.ajax.reload();
        }
    }
}

function btnEliminarPunto(id) {
    Swal.fire({
        title: '¿Esta seguro de la eliminacion?',
        text: "El punto de atencion no se eliminara de forma permanente, solo cambia a estado inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Puntos/eliminar/" + id;
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
                        tblPuntos.ajax.reload();
                    }
                }
            }

        }
    })
}

function btnReingresarPunto(id) {
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
            const url = base_url + "Puntos/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == '') {
                        alertas("No tiene permiso de realizar esta accion", "warning");
                    } else {
                        tblPuntos.ajax.reload();
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

    if (nombre.value == "" || ubicacion.value == "") {
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
//--------------------------------------------------------
function frmEspacio() {
    document.getElementById("tituloModal").textContent = "Registrar espacio";
    document.getElementById("btnAccion").textContent = "Registrar";
    document.getElementById("frmEspacio").reset();
    myModal.show();
    document.getElementById("id").value = "";
}

function registrarEspacio(e) {
    e.preventDefault();
    const estacionamiento = document.getElementById("estacionamiento");
    const numero = document.getElementById("numero");
    // const vehiculo = document.getElementById("vehiculo");
    // const ingreso = document.getElementById("ingreso");
    // const salida = document.getElementById("salida");

    if (numero.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Espacios/registrar";
        const frm = document.getElementById("frmEspacio");
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
                tblEspacios.ajax.reload();
            }
        }
    }
}

function btnEditarEspacio(id) {
    document.getElementById("tituloModal").textContent = "Actualizar espacio";
    document.getElementById("btnAccion").textContent = "Modificar";
    const url = base_url + "Espacios/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            console.log(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("estacionamiento").value = res.id_estacionamiento;
            document.getElementById("numero").value = res.nro_espacio;
            // document.getElementById("vehiculo").value = res.id_vehiculo;
            // document.getElementById("ingreso").value = res.hora_ingreso;
            // document.getElementById("salida").removeAttribute('disabled');
            // document.getElementById("salida").value = res.hora_salida;
            myModal.show();
            console.log(res);
            tblEspacios.ajax.reload();
        }
    }
}

function btnEliminarEspacio(id) {
    Swal.fire({
        title: '¿Esta seguro de la eliminacion?',
        text: "El espacio no se eliminara de forma permanente, solo cambia a estado inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Espacios/eliminar/" + id;
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
                        tblEspacios.ajax.reload();
                    }
                }
            }

        }
    })
}

function btnReingresarEspacio(id) {
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
            const url = base_url + "Espacios/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == '') {
                        alertas("No tiene permiso de realizar esta accion", "warning");
                    } else {
                        tblEspacios.ajax.reload();
                        alertas(res.msg, res.icono);
                    }
                }
            }

        }
    })
}
//--------------------------------------------------------
function frmAdministrador() {
    document.getElementById("tituloModal").textContent = "Registrar cliente";
    document.getElementById("btnAccion").textContent = "Registrar";
    document.getElementById("frmAdministrador").reset();
    myModal.show();
    document.getElementById("id").value = "";
}

function registrarAdministrador(e) {
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const ci = document.getElementById("ci");
    const codigo_saga = document.getElementById("codigo_saga");
    const id_usuario = document.getElementById("id_usuario");

    if (nombre.value == "" || ci.value == "" || codigo_saga.value == "" || id_usuario.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Administrador/registrar";
        const frm = document.getElementById("frmAdministrador");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                frm.reset();
                myModal.hide();
                tblAdministrador.ajax.reload();
            }
        }
    }
}

function btnEditarAdministrador(id) {
    document.getElementById("tituloModal").textContent = "Actualizar administrador";
    document.getElementById("btnAccion").textContent = "Modificar";
    const url = base_url + "Administrador/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("ci").value = res.ci;
            document.getElementById("codigo_saga").value = res.codigo_saga;
            document.getElementById("id_usuario").value = res.id_usuario;
            myModal.show();
            console.log(res)
            tblAdministrador.ajax.reload();
        }
    }

}

function btnEliminarAdministrador(id) {
    Swal.fire({
        title: '¿Esta seguro de la eliminacion?',
        text: "No se eliminara de forma permanente, solo cambia a estado inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Administrador/eliminar/" + id;
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
                        tblAdministrador.ajax.reload();
                    }
                }
            }

        }
    })
}

function btnReingresarAdministrador(id) {
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
            const url = base_url + "Administrador/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == '') {
                        alertas("No tiene permiso de realizar esta accion", "warning");
                    } else {
                        tblAdministrador.ajax.reload();
                        alertas(res.msg, res.icono);
                    }
                }
            }

        }
    })
}
//--------------------------------------------------------
function frmPago() {
    document.getElementById("tituloModal").textContent = "Registrar pago";
    document.getElementById("btnAccion").textContent = "Registrar";
    document.getElementById("frmPago").reset();
    myModal.show();
    document.getElementById("id").value = "";
}

function registrarPago(e) {
    e.preventDefault();
    const monto = document.getElementById("monto");

    if (monto.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Pagos/registrar";
        const frm = document.getElementById("frmPago");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                frm.reset();
                myModal.hide();
                tblPagos.ajax.reload();
            }
        }
    }
}

function btnEditarPago(id) {
    document.getElementById("tituloModal").textContent = "Actualizar pago";
    document.getElementById("btnAccion").textContent = "Modificar";
    const url = base_url + "Pagos/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("monto").value = res.monto;
            myModal.show();
            console.log(res)
            tblPagos.ajax.reload();
        }
    }

}

function btnEliminarPago(id) {
    Swal.fire({
        title: '¿Esta seguro de la eliminacion?',
        text: "No se eliminara de forma permanente, solo cambia a estado inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Pagos/eliminar/" + id;
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
                        tblPagos.ajax.reload();
                    }
                }
            }

        }
    })
}

function btnReingresarPago(id) {
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
            const url = base_url + "Pagos/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == '') {
                        alertas("No tiene permiso de realizar esta accion", "warning");
                    } else {
                        tblPagos.ajax.reload();
                        alertas(res.msg, res.icono);
                    }
                }
            }

        }
    })
}
//--------------------------------------------------------
function frmFactura() {
    document.getElementById("tituloModal").textContent = "Registrar factura";
    document.getElementById("btnAccion").textContent = "Registrar";
    document.getElementById("frmFactura").reset();
    myModal.show();
    document.getElementById("id").value = "";
}

function registrarFactura(e) {
    e.preventDefault();
    const registro = document.getElementById("registro");
    const nit = document.getElementById("nit");
    const monto_pagado = document.getElementById("monto_pagado");
    const monto_recibido = document.getElementById("monto_recibido");
    const fecha_emision = document.getElementById("fecha_emision");
    const fecha_limite = document.getElementById("fecha_limite");

    if (registro.value == "" || nit.value == "" || monto_pagado.value == "" || monto_recibido.value == "" || fecha_emision.value == "" || fecha_limite.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
    } else {
        const url = base_url + "Facturas/registrar";
        const frm = document.getElementById("frmFactura");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                frm.reset();
                myModal.hide();
                tblFacturas.ajax.reload();
            }
        }
    }
}

function btnEditarFactura(id) {
    document.getElementById("tituloModal").textContent = "Actualizar factura";
    document.getElementById("btnAccion").textContent = "Modificar";
    const url = base_url + "Facturas/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("registro").value = res.id_registro;
            document.getElementById("nit").value = res.nit;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("cantidad").value = res.cantidad;
            document.getElementById("fecha_emision").value = res.fecha_emision;
            document.getElementById("fecha_limite").value = res.fecha_limite_emision;
            myModal.show();
            console.log(res)
            tblFacturas.ajax.reload();
        }
    }

}

function btnEliminarFactura(id) {
    Swal.fire({
        title: '¿Esta seguro de la anulacion?',
        text: "Se anulara la factura",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Facturas/eliminar/" + id;
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
                        tblFacturas.ajax.reload();
                    }
                }
            }

        }
    })
}

function btnReingresarFactura(id) {
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
            const url = base_url + "Facturas/reingresar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == '') {
                        alertas("No tiene permiso de realizar esta accion", "warning");
                    } else {
                        tblFacturas.ajax.reload();
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