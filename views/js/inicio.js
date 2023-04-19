var tabla_menus, getMenus;
$(document).ready(function () {
    menus();

    $("#menu_padre").blur(function () {
        if ($(this).val() != "") {
            validaMenuPadre(1);
        }
    }).triggerHandler('change');

    $("#menuPadreUpdate").blur(function () {
        if ($(this).val() != "") {
            validaMenuPadre(2);
        }
    }).triggerHandler('change');
});

function validaMenuPadre(opcion) {
    if (opcion == 1) {
        var mp = $("#menu_padre").val();
    } else if (opcion == 2) {
        var mp = $("#menuPadreUpdate").val();
    }


    // if($("#menu_padre").val()!=""){


    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        data: { mp: mp },
        url: "ajax/InicioAjax.php",

        success: function (res) {
            if (res.success == true) {
                console.log('exiuste en la db');

            } else {
                Swal.fire({
                    icon: 'error',
                    title: '' + res.msg,
                    text: '',
                    timer: 3000,
                    footer: '',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-outline-info btn-rounded'
                    }
                })
                $("#menu_padre").val('');
                $("#menuPadreUpdate").val('');
            }
        }
    });

}

function cleanform() {
    $("#nombre").val('');
    $("#menu_padre").val('');
    $("#descripcion").val('');
    $("#idUpdate").val('');
    $("#nombreUpdate").val('');
    $("#menuPadreUpdate").val('');
    $("#descripcionUpdate").val('');
}


function menus() {


    var contenido = '';
    $.each(getMenus, function (index, value) {
        console.log(value.id);
        contenido += '<tr id="menu_' + value.id + '" data-nombre="' + value.nombre + '" data-menuPadre="' + value.menu_padre + '" data-descripcion="' + value.descripcion + '" ondblclick="showInfo(\'' + value.descripcion + '\')">' +
            '<td>' + value.id + '</td>' +
            '<td>' + value.nombre + '</td>' +
            '<td>' + value.menu_padre + '</td>' +
            '<td>' + value.descripcion + '</td>' +
            '<td class="gl-text-center" style="width: 50px;">' +
            '<button class="btn gl-btn-circle btn-outline-info mdi mdi-lead-pencil gl-text-size-small" type="button" title="Editar" onclick="editmenu(' + value.id + ')"></button>' +
            '</td>' +
            '<td class="gl-text-center" style="width: 50px;">' +
            '<button class="btn gl-btn-circle btn-outline-danger mdi mdi-delete gl-text-size-small" type="button" title="Eliminar" onclick="deletmenu(' + value.id + ')"></button>' +
            '</td>' +
            '</tr> ';

    });


    if ($.fn.dataTable.isDataTable('#tb__menus')) {
        tabla_menus.destroy();
    }

    $("#tb__menus--tbody").html(contenido);
    tabla_menus = $('#tb__menus').DataTable({
        "scrollY": "600px",
        "scrollCollapse": true,
        "lengthMenu": [[20, 50, 75, 100, -1], [20, 50, 75, 100, "Todo"]],
        // "language": {
        //     "url": url+"/public/dist/js/dataTables.Spanish.json"
        // },
        dom: "<'row'<'col-sm-2'f><'col-sm-8 gl-text-end'B><'col-sm-2'l>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            {
                extend: '',
                action: function (e, dt, node, config) {
                    cleanform();
                    $('#nuevo--menu').modal('show');
                },
                text: '<i class="me-2 mdi mdi-plus-circle"></i> Agregar',
                titleAttr: 'Agregar',
                title: 'Menus',
                attr: {
                    class: 'btn btn-outline-success btn-rounded gl-text-size-075rem'
                }
            },
            {
                extend: 'excelHtml5',
                text: '<i class="ri-file-excel-2-fill"></i> Excel',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                },
                titleAttr: 'Excel',
                title: 'Menus',
                attr: {
                    class: 'btn btn-outline-dark btn-rounded gl-text-size-075rem'
                }
            },
        ]
    });

}

function save_registro_menu() {
    if ($("#nombre").val() != "") {
        event.preventDefault();
        var formData = new FormData(document.getElementById("nuevo--menu__from"));

        $.ajax({
            url: "ajax/InicioAjax.php",
            type: "POST",
            cache: false,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {

                //$("#nuevo--menu__guardar").removeAttr('disabled','disabled');
                if (data.success == true) {
                    Swal.fire({
                        icon: 'success',
                        title: '' + data.msg,
                        text: '',
                        timer: 3000,
                        footer: '',
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: 'btn btn-outline-info btn-rounded'
                        }
                    })
                    cleanform();
                    getMenus = data.getMenus;
                    menus();

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: '' + data.msg,
                        text: '',
                        timer: 3000,
                        footer: '',
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: 'btn btn-outline-info btn-rounded'
                        }
                    })
                }


            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('error intentar mas tarde');
            }
        });

    }
}

function editmenu(id) {
    $("#idUpdate").val(id);
    $("#nombreUpdate").val($("#menu_" + id).attr('data-nombre'));
    $("#menuPadreUpdate").val($("#menu_" + id).attr('data-menuPadre'));
    $("#descripcionUpdate").val($("#menu_" + id).attr('data-descripcion'));
    $('#editar--Menu').modal('show');

}

function edit_registro_menu() {
    if ($("#nombreUpdate").val() != "") {


        event.preventDefault();
        var formData = new FormData(document.getElementById("editar--menu__from"));

        $.ajax({
            url: "ajax/InicioAjax.php",
            type: "POST",
            cache: false,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                if (data.success == true) {
                    Swal.fire({
                        icon: 'success',
                        title: '' + data.msg,
                        text: '',
                        timer: 3000,
                        footer: '',
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: 'btn btn-outline-info btn-rounded'
                        }
                    })
                    cleanform();
                    $('#editar--Menu').modal('hide');
                    getMenus = data.getMenus;
                    menus();

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: '' + data.msg,
                        text: '',
                        timer: 3000,
                        footer: '',
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: 'btn btn-outline-info btn-rounded'
                        }
                    })
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Intentalo más tarde',
                    timer: 3000,
                    footer: '',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-outline-info btn-rounded'
                    }
                })
            }
        });
    }

}

function deletmenu(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: '',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        buttonsStyling: false,
        customClass: {
            confirmButton: 'btn btn-outline-danger btn-rounded gl-bt-margin-right-1rem',
            cancelButton: 'btn btn-outline-info btn-rounded'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/InicioAjax.php",
                type: 'post',
                dataType: "JSON",
                data: { idDelete: id },
                success: function (data) {
                    if (data.success == true) {
                        Swal.fire({
                            icon: 'success',
                            title: '' + data.msg,
                            text: '',
                            timer: 3000,
                            footer: '',
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-outline-info btn-rounded'
                            }
                        })
                        getMenus = data.getMenus;
                        menus();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '' + data.msg,
                            text: '',
                            timer: 3000,
                            footer: '',
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-outline-info btn-rounded'
                            }
                        })
                    }
                }
            });
        }
    })
}


function showInfo(info) {
    $("#Pinfo--menu").html(info)
    $('#info--Menu').modal('show');
}