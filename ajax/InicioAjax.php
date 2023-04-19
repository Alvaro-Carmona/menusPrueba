<?php
require_once '../controllers/MenuController.php';
require_once '../models/MenuModel.php';
class InicioAjax
{
    public $id;
    public $nombre;
    public $menuPadre;
    public $descripcion;

    /**===============================================
     *      FUNCIONES
         =================================================*/

    /**REGISTAR MENU */

    public function save_registro_menu()
    {
        $data = [
            "nombre"       => mb_strtoupper(trim($this->nombre)),
            "menuPadre"    => mb_strtoupper(trim($this->menuPadre)),
            "descripcion"  => mb_strtoupper(trim($this->descripcion))
        ];

        $response = MenuController::save_menu_controller($data);
        echo json_encode($response);
    }
    /**ACTUALIZAR MENU */

    public function update_menu()
    {
        $data = [
            "id"           => $this->id,
            "nombre"       => mb_strtoupper(trim($this->nombre)),
            "menuPadre"    => mb_strtoupper(trim($this->menuPadre)),
            "descripcion"  => mb_strtoupper(trim($this->descripcion))
        ];
        $response = MenuController::updateMenuController($data);
        echo json_encode($response);
    }
    /**ELIMINAR MENU */

    public function delete_menu()
    {
        $id = $this->id;
        $response = MenuController::deleteMenuController($id);

        echo json_encode($response);
    }
    /**BUSCA SI YA ESTA REGISTRADO UN  MENU */

    public function validaMenuPadre()
    {
        $padre = mb_strtoupper(trim($this->menuPadre));
        $response = MenuController::getMenuPController($padre);
        echo json_encode($response);
    }
}
/**===============================================
 *      INSTANCIA DE CLASE Y LLMADA A FUNCIONES
=================================================*/
if (isset($_POST['mp'])) {

    $init = new InicioAjax();
    $init->menuPadre = $_POST['mp'];
    $init->validaMenuPadre();
}

if (isset($_POST['nombre'])) {
    $init = new InicioAjax();
    $init->nombre = $_POST['nombre'];
    $init->menuPadre = $_POST['menu_padre'];
    $init->descripcion = $_POST['descripcion'];
    $init->save_registro_menu();
}

if (isset($_POST['idUpdate'])) {
    $init = new InicioAjax();
    $init->id = $_POST['idUpdate'];
    $init->nombre = $_POST['nombreUpdate'];
    $init->menuPadre = $_POST['menuPadreUpdate'];
    $init->descripcion = $_POST['descripcionUpdate'];
    $init->update_menu();
}

if (isset($_POST['idDelete'])) {
    $init = new InicioAjax();
    $init->id = $_POST['idDelete'];
    $init->delete_menu();
}
