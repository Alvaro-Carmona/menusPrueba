<?php
include 'views/modules/header.php';
?>

<!-- Container fluid  -->

<div class="">
    <div class="card">
        <div class="border-bottom title-part-padding">
            <h4 class="card-title mb-0">Menu</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tb__menus" class="table table-striped table-bordered display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Menu Padre</th>
                            <th>Descripcion</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="tb__menus--tbody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Agregar Menu-->
<div class="modal fade" id="nuevo--menu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header d-flex align-items-center gl-bg-azul text-white">
                <h4 class="modal-title">Agregar Menu</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="nuevo--menu__from" onsubmit="save_registro_menu()" name="nuevo--menu__from" id="nuevo--menu__from" action="javascript:void(0)" autocomplete="off">
                    <div class="row">
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-1">
                            <label for="nombre">*Nombre:</label>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 mb-1">
                            <input type="text" class="form-control gl-element-height  sorting_1" id="nombre" name="nombre" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-1">
                            <label for="menu_padre">Menu Padre:</label>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 mb-1">
                            <input type="text" class="form-control gl-element-height gl-text-mayus" id="menu_padre" name="menu_padre">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-1">
                            <label for="descripcion">Descripción</label>
                        </div>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required=""></textarea>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success btn-rounded" id="nuevo--menu__guardar"><i class="me-2 mdi mdi-send"></i>Guardar</button>
                </form>
                <button type="button" class="btn btn-outline-dark btn-rounded" data-bs-dismiss="modal"><i class="me-2 mdi mdi-undo-variant"></i>Cancelar</button>
            </div>
        </div>
    </div>

</div>
<!-- FIN Modal Agregar Menu-->

<!-- Modal Editar Menu-->
<div class="modal fade" id="editar--Menu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header d-flex align-items-center gl-bg-azul text-white">
                <h4 class="modal-title">Modificar Menu</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="EditarFrom--menu__from" onsubmit="edit_registro_menu()" name="editar--menu__from" id="editar--menu__from" action="javascript:void(0)" autocomplete="off">
                    <input type="hidden" class="form-control gl-element-height gl-numero sorting_1" id="idUpdate" name="idUpdate">

                    <div class="row">
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-1">
                            <label for="nombreUpdate">*Nombre:</label>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 mb-1">
                            <input type="text" class="form-control gl-element-height  sorting_1" id="nombreUpdate" name="nombreUpdate" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-1">
                            <label for="menuPadreUpdate">Menu Padre:</label>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 mb-1">
                            <input type="text" class="form-control gl-element-height gl-text-mayus" id="menuPadreUpdate" name="menuPadreUpdate">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-1">
                            <label for="descripcionUpdate">Descripción</label>
                        </div>
                        <textarea class="form-control" id="descripcionUpdate" name="descripcionUpdate" rows="3" required=""></textarea>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success btn-rounded" id="editar--menu__guardar"><i class="me-2 mdi mdi-send"></i>Guardar</button>
                </form>
                <button type="button" class="btn btn-outline-dark btn-rounded" data-bs-dismiss="modal"><i class="me-2 mdi mdi-undo-variant"></i>Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- info menu  -->

<div class="modal fade" id="info--Menu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header d-flex align-items-center gl-bg-azul text-white">
                <h4 class="modal-title">Información del Menu</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="Pinfo--menu"></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark btn-rounded" data-bs-dismiss="modal"><i class="me-2 mdi mdi-undo-variant"></i>Aceptar</button>
            </div>
        </div>
    </div>
</div>



<!-- Temrina modal editar Menu -->