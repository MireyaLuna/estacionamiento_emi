let tblUsuarios, tblVehiculos, tblClientes, tbl_tickets, tblPuntos, tblEstacionamientos, tbl_MisTickets, tblEspacios, tblMisVehiculos, tblAdministrador, tblPagos, tblFacturas, tbl_detalles, codigo, factura_id, myModal;
document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById('my_modal')) {
        myModal = new bootstrap.Modal(document.getElementById('my_modal'));
    }
    if (document.getElementById('tblUsuarios')) {
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
                //     'data': 'estacionamiento',
                // }, {
                //     'data': 'fecha_creacion',
                // }, {
                //     'data': 'usuario_creacion',
                // }, {
                //     'data': 'fecha_modificacion',
                // }, {
                //     'data': 'usuario_modificador',
                // }, {
                'data': 'estado',
            }, {
                'data': 'acciones',
            }],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',

                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge bg-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge bg-dark"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  bg-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  bg-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
        });
    }
    if (document.getElementById('tblVehiculos')) {
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
                //     'data': 'fecha_creacion',
                // }, {
                // 'data': 'usuario_creacion',
                // }, {
                //     'data': 'fecha_modificacion',
                // }, {
                // 'data': 'usuario_modificador',
                // }, {
                'data': 'estado',
            }, {
                'data': 'acciones',
            }],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',

                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge bg-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge bg-dark"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  bg-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  bg-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
        });
    }
    if (document.getElementById('tblClientes')) {
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
                //     'data': 'fecha_creacion',
                // }, {
                // 'data': 'usuario_creacion',
                // }, {
                //     'data': 'fecha_modificacion',
                // }, {
                // 'data': 'usuario_modificador',
                // }, {
                'data': 'estado',
            }, {
                'data': 'acciones',
            }],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',

                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge bg-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge bg-dark"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  bg-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  bg-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
        });
    }
    if (document.getElementById('tblPuntos')) {
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
                //     'data': 'estacionamiento',
                // }, {
                //     'data': 'fecha_creacion',
                // }, {
                // 'data': 'usuario_creacion',
                // }, {
                //     'data': 'fecha_modificacion',
                // }, {
                // 'data': 'usuario_modificador',
                // }, {
                'data': 'estado',
            }, {
                'data': 'acciones',
            }],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',

                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge bg-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge bg-dark"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  bg-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  bg-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
        });
    }
    if (document.getElementById('tblEstacionamientos')) {
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
                //     'data': 'fecha_creacion',
                // }, {
                // 'data': 'usuario_creacion',
                // }, {
                //     'data': 'fecha_modificacion',
                // }, {
                // 'data': 'usuario_modificador',
                // }, {
                'data': 'estado',
            }, {
                'data': 'acciones',
            }],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',

                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge bg-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge bg-dark"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  bg-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  bg-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
        });
    }
    if (document.getElementById('tblEspacios')) {
        tblEspacios = $('#tblEspacios').DataTable({
            ajax: {
                url: base_url + "Espacios/listar",
                dataSrc: ''
            },
            columns: [{
                'data': 'id',
            }, {
                //     'data': 'estacionamiento',
                // }, {
                'data': 'nro_espacio',
            }, {
                //     'data': 'id_vehiculo',
                // }, {
                //     'data': 'hora_ingreso',
                // }, {
                //     'data': 'hora_salida',
                // }, {
                //     'data': 'fecha_creacion',
                // }, {
                // 'data': 'usuario_creacion',
                // }, {
                //     'data': 'fecha_modificacion',
                // }, {
                // 'data': 'usuario_modificador',
                // }, {
                'data': 'estado',
            }, {
                'data': 'acciones',
            }],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',

                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge bg-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge bg-dark"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  bg-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  bg-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
        });
    }
    if (document.getElementById('tblAdministrador')) {
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
            }],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',

                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge bg-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge bg-dark"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  bg-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  bg-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
        });
    }
    if (document.getElementById('tblFacturas')) {
        tblFacturas = $('#tblFacturas').DataTable({
            ajax: {
                url: base_url + "Facturas/listar",
                dataSrc: ''
            },
            columns: [{
                'data': 'id',
            }, {
                'data': 'id_ticket',
            }, {
                'data': 'nit',
            }, {
                'data': 'monto_total',
            }, {
                'data': 'fecha_emision',
            }, {
                'data': 'estado',
            }, {
                'data': 'acciones',
            }],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',

                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge bg-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge bg-dark"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  bg-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  bg-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
        });
    }
    if (document.getElementById('tbl_tickets')) {
        tbl_tickets = $('#tbl_tickets').DataTable({
            ajax: {
                url: base_url + "Tickets/listar_tickets",
                dataSrc: ''
            },
            columns: [{
                'data': 'id',
            }, {
                'data': 'codigo',
            }, {
                'data': 'placa',
            }, {
                'data': 'espacio',
            }, {
                'data': 'hora_ingreso',
            }, {
                'data': 'hora_salida',
            }, {
                'data': 'estado',
            }, {
                'data': 'acciones',
            }],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',

                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge bg-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte',
                    filename: 'Reporte',
                    text: '<span class="badge  bg-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge bg-dark"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  bg-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  bg-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
        });
    }
    if (document.getElementById('tbl_detalles')) {
        tbl_detalles = $('#tbl_detalles').DataTable({
            ajax: {
                url: base_url + "Tickets/listar_detalle",
                dataSrc: ''
            },
            columns: [{
                'data': 'tipo_vehiculo',
            }, {
                'data': 'placa',
            }, {
                'data': 'hora_ingreso',
            }, {
                'data': 'hora_ingreso',
            }],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',

                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge bg-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  bg-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte',
                    filename: 'Reporte',
                    text: '<span class="badge  bg-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge bg-dark"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  bg-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  bg-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
        });
    }
    if (document.getElementById('tblMisVehiculos')) {
        tblMisVehiculos = $('#tblMisVehiculos').DataTable({
            ajax: {
                url: base_url + "Usuarios/listar_misVehiculos",
                dataSrc: ''
            },
            columns: [{
                'data': 'tipo_vehiculo',
            }, {
                'data': 'placa',
            }, {
                'data': 'color',
            }, {
                'data': 'marca',
            }],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            }
        });
    }
    if (document.getElementById('tbl_MisTickets')) {
        tbl_MisTickets = $('#tbl_MisTickets').DataTable({
            ajax: {
                url: base_url + "Usuarios/listar_MisTickets",
                dataSrc: ''
            },
            columns: [{
                'data': 'codigo',
            }, {
                'data': 'placa',
            }, {
                'data': 'espacio_ocupado',
            }, {
                'data': 'hora_ingreso',
            }, {
                'data': 'hora_salida',
            }, {
                'data': 'estado',
            }],
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            }
        });
    }
    if (document.getElementById('desde') || document.getElementById('hasta') || document.getElementById('desdeF') || document.getElementById('hastaF')) {
        $('#desde').change(function () {
            tbl_tickets.draw();
        })
        $('#hasta').change(function () {
            tbl_tickets.draw();
        })
        $('#desdeF').change(function () {
            tblFacturas.draw();
        })
        $('#hastaF').change(function () {
            tblFacturas.draw();
        })
    }
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
        setTimeout(() => {
            http.open("POST", url, true);
            http.send(new FormData(frm));
        }, 100);
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                console.log(res);
                if (res == "ok") {
                    window.location = base_url + "Administrador/home";
                } else {
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").textContent = res;
                }
            }
        }
    }
}

function frmCambiarPass(e) {
    e.preventDefault();
    const actual = document.getElementById('clave_actual').value;
    const nueva = document.getElementById('clave_nueva').value;
    const confirmar = document.getElementById('confirmar_clave').value;

    if (actual == '' || nueva == '' || confirmar == '') {
        alertas('Todos los campos son obligatorios', 'warning');
        // return false;
    } else {
        if (nueva != confirmar) {
            alertas('Las contraseñas no coinciden', 'warning');
            // return false;
        } else {
            const url = base_url + "Usuarios/cambiarPass";
            const frm = document.getElementById("frmCambiarPass");
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    // myModal.hide();
                    $("#cambiarPass").modal("hide");
                    frm.reset();
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
    // const id_estacionamiento = document.getElementById("estacionamiento");
    if (usuario.value == "" || nombre.value == "" || genero.value == "" || cargo.value == "") {
        alertas('Todo los campos son obligatorios', 'warning');
        // } else if (clave.value != confirmar.value) {
        //     alertas('Las contraseñas no coinciden', 'warning');
    } else {
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
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
            // console.log(res);
            document.getElementById("id").value = res.id;
            document.getElementById("usuario").value = res.usuario;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("genero").value = res.genero;
            document.getElementById("cargo").value = res.cargo;
            // document.getElementById("estacionamiento").value = res.id_estacionamiento;
            document.getElementById("claves").classList.add('d-none');
            myModal.show();
            tblUsuarios.ajax.reload();
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
                console.log(res);
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
    const genero = document.getElementById("genero");
    const cargo = document.getElementById("cargo");

    if (nombre.value == "" || ci.value == "" || telefono.value == "" || genero.value == "" || cargo.value == "") {
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
            document.getElementById("datosUsuario").classList.add('d-none');
            myModal.show();
            // console.log(res)
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
                // console.log(res);
                alertas(res.msg, res.icono);
                frm.reset();
                myModal.hide();
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
                // tblEstacionamientos.ajax.reload();
            }
        }
    }
}

function btnEditarEstacionamiento() {
    const id = 1;
    document.getElementById("tituloModal").textContent = "Actualizar estacionamiento";
    document.getElementById("btnAccion").textContent = "Modificar";
    const url = base_url + "Estacionamientos/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            // console.log(res);
            document.getElementById("id").value = res.id;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("ubicacion").value = res.ubicacion;
            myModal.show();
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
                console.log(this.responseText);
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
//---------------------------------------------------------

function buscarPlaca(e) {
    e.preventDefault();
    // document.getElementById("ticket").removeAttribute('enabled');
    // removeAttribute('disabled');
    if (e.which == 13) {
        const n_placa = document.getElementById("placa").value;
        const url = base_url + "Tickets/buscarPlaca/" + n_placa;
        const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "existe") {
                    alertas("El vehiculo ya esta dentro del parqueo", "warning");
                    // console.log(res);
                    return;
                }
                if (!res) {
                    // console.log(res);
                    alertas("Vehiculo no encontrado", "warning");
                    return;
                } else {
                    // console.log(res);
                    document.getElementById("placa_vehiculo").value = res.placa;
                    document.getElementById("tipo_vehiculo").value = res.tipo_vehiculo;
                    document.getElementById("tipo").value = res.tipo;
                    document.getElementById("id_vehiculo").value = res.id;
                    return;
                }

            }
        }
    }
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function facturar() {
    const ruta = base_url + 'Facturas/generarPDF/' + codigo;
    window.open(ruta);
    await sleep(1000);
}
async function tickete() {
    const ruta = base_url + 'Tickets/generarPDF/' + codigo;
    window.open(ruta);
    await sleep(1000);
}

function generarTicket() {
    // codigo = 123;
    const url = base_url + "Tickets/obtenerCodigo";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const rs = JSON.parse(this.responseText);
            // console.log(rs.cantidad);
            codigo = rs.cantidad + 1;
            // console.log(codigo);
        }
    }
    setTimeout(() => {

        const placa_vehiculo = document.getElementById("placa_vehiculo");
        const tipo = document.getElementById("tipo");
        const espacio = document.getElementById("espacio");
        const hora_ingreso = document.getElementById("hora_ingreso");
        const fecha_ingreso = document.getElementById("fecha_ingreso");

        if (placa_vehiculo.value == "" || hora_ingreso.value == "" || fecha_ingreso.value == "" || espacio.value == "") {
            alertas('Todo los campos son obligatorios', 'warning');
        } else {
            const url = base_url + "Tickets/registrar/" + fecha_ingreso.value + "/" + hora_ingreso.value + "/" + tipo.value;
            const frm = document.getElementById("nuevoRegistro");
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    // console.log(res);
                    alertas(res.msg, res.icono);
                    const u = base_url + "Espacios/ocupar/" + espacio.value;
                    const h = new XMLHttpRequest();
                    h.open("GET", u, true);
                    h.send();
                    h.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            // console.log(this.responseText);
                            const rspt = JSON.parse(this.responseText);
                            console.log(codigo);
                            if (rspt == '') {
                                alertas('No tiene permiso', 'warning');
                            } else {
                                frm.reset();
                                if (codigo == 0) {
                                    codigo = 1;
                                }
                                tickete();
                                location.reload();
                                setTimeout(() => {
                                    window.location.reload();
                                }, 300);
                            }
                        }
                    }
                }
            }
        }
    }, 100);
}

function btnAnularTicket(id) {
    Swal.fire({
        title: '¿Estas seguro de anular el ticket?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Tickets/anular/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res == "") {
                        alertas("No tiene permiso de realizar esta accion", "warning");
                    } else {
                        alertas(res.msg, res.icono);
                        tbl_tickets.ajax.reload();
                    }
                }
            }
        }
    })
}



function generarFactura() {
    const url = base_url + "Facturas/obtenerIDfactura";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const r = JSON.parse(this.responseText);
            console.log(r);
            codigo = r.factura + 0;
        }
    }
    // setTimeout(() => {

    const nit = document.getElementById("nit");
    const razon = document.getElementById("razon_social");
    const monto_total = document.getElementById("monto_total");
    const id_ticket = document.getElementById("id_ticket");
    const hora_salida = document.getElementById("hora_salida");
    const fecha_salida = document.getElementById("fecha_salida");

    if (nit.value == "" || razon.value == "") {
        alertas('Ingrese datos de facturacion (ENTER)', 'warning');
    } else {
        const url = base_url + "Facturas/registrar/" + monto_total.value + "/" + fecha_salida.value + "/" + hora_salida.value;
        const frm = document.getElementById("frmFactura");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                console.log(res);
                alertas(res.msg, res.icono);
                const u = base_url + "Tickets/ticketFacturado/" + id_ticket.value;
                const h = new XMLHttpRequest();
                h.open("GET", u, true);
                h.send();
                h.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        const rspt = JSON.parse(this.responseText);
                        if (rspt == '') {
                            alertas('No tiene permiso', 'warning');
                        } else {
                            if (codigo == 0) {
                                codigo = 1;
                            }
                            frm.reset();
                            // tbl_tickets.ajax.reload();
                            facturar();
                            location.reload();
                            setTimeout(() => {
                                window.location.reload();
                            }, 300);
                        }
                    }
                }
            }
        }
    }
    // }, 100);
}

function buscarNIT(e) {
    e.preventDefault();
    if (e.which == 13) {
        const nit = document.getElementById("nit").value;
        const url = base_url + "Facturas/buscarNIT/" + nit;
        const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                console.log(res);
                document.getElementById("razon_social").value = res.razon_social;
                if (res) {
                    document.getElementById("razon_social").value = res.razon_social;
                    return;
                } else {
                    document.getElementById("razon_social").value = "";
                    document.getElementById("razon_social").removeAttribute('disabled');
                    document.getElementById("razon_social").focus();
                    return;
                }

            }
        }
    }
}

function registrarNIT(e) {
    e.preventDefault();
    if (e.which == 13) {
        const nit = document.getElementById("nit");
        const razon_social = document.getElementById("razon_social");

        if (nit.value == "" || razon_social.value == "") {
            alertas('Campos para factura obligatorios', 'warning');
        } else {
            const url = base_url + "Facturas/registrarNIT";
            const frm = document.getElementById("frmFactura");
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    // frm.reset();
                    // myModal.hide();
                    // tblFacturas.ajax.reload();
                }
            }
        }
    }
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

// function zeroFill(number, width) {
//     width -= number.toString().length;
//     if (width > 0) {
//         return new Array(width + (/\./.test(number) ? 2 : 1)).join('0') + number;
//     }
//     return number + "";
// }
var actualizar_fecha = function () {
    let currentDate = new Date(),
        hours = currentDate.getHours(),
        minutes = currentDate.getMinutes(),
        seconds = currentDate.getSeconds(),
        weekDay = currentDate.getDay(),
        day = currentDate.getDate(),
        month = currentDate.getMonth(),
        year = currentDate.getFullYear();
    const weekDays = [
        'Domingo',
        'Lunes',
        'Martes',
        'Miércoles',
        'Jueves',
        'Viernes',
        'Sabado'
    ];
    document.getElementById('weekDay').textContent = weekDays[weekDay];
    document.getElementById('day').textContent = day;
    const months = [
        'Enero',
        'Febrero',
        'Marzo',
        'Abril',
        'Mayo',
        'Junio',
        'Julio',
        'Agosto',
        'Septiembre',
        'Octubre',
        'Noviembre',
        'Diciembre'
    ];
    document.getElementById('month').textContent = months[month];
    document.getElementById('year').textContent = year;
    document.getElementById('hours').textContent = hours;

    if (minutes < 10) {
        minutes = "0" + minutes
    }

    if (seconds < 10) {
        seconds = "0" + seconds
    }

    document.getElementById('minutes').textContent = minutes;
    document.getElementById('seconds').textContent = seconds;
};

if (document.getElementById('weekDay')) {
    actualizar_fecha();
    setInterval(actualizar_fecha, 1000);
}
if (document.getElementById('desde') && document.getElementById('hasta')) {
    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            let desde = $('#desde').val();
            let hasta = $('#hasta').val();
            let data_fecha = data[4].split(' ');
            let fecha = data_fecha[0].trim();
            // console.log(data);
            if (desde == '' || hasta == '') {
                return true;
            }
            if (fecha >= desde && fecha <= hasta) {
                return true;
            } else {
                return false;
            }

        }
    );
}
if (document.getElementById('desdeF') && document.getElementById('hastaF')) {
    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            let desdeF = $('#desdeF').val();
            let hastaF = $('#hastaF').val();
            let data_fechaF = data[4].split(' ');
            let fechaF = data_fechaF[0].trim();
            // console.log(data);
            if (desdeF == '' || hastaF == '') {
                return true;
            }
            if (fechaF >= desdeF && fechaF <= hastaF) {
                return true;
            } else {
                return false;
            }

        }
    );
}

function mostrarTodo() {
    document.getElementById('desde').value = '';
    document.getElementById('hasta').value = '';
    tbl_tickets.draw();
}

function mostrarTodoF() {
    document.getElementById('desdeF').value = '';
    document.getElementById('hastaF').value = '';
    tblFacturas.draw();
}