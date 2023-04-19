<?php
    class MenuController{
        /**FUNCION QUE MUESTRA EL INICIO DEL SITIO  */
        public function template(){
            include 'views/template.php';
        }
        /**REGISTAR MENU */

        public static function save_menu_controller($data){
            if(MenuModel::save_menu_model($data)){
                $response = [
                    'success'   => true,
                    'msg'       => "Información guardada",
                    'getMenus'  => MenuModel::getMenus()
                ];
            }else{
                $response = [
                    'success'   => false,
                    'msg'       => "problemas para guardar la información"
                ];
            }
            return $response;
        }
        /**ACTUALIZAR MENU */

        public static function updateMenuController($data){
            
            if(MenuModel::updateMenu($data)){
                $response = [
                    'success'   => true,
                    'msg'       => "Información Actualizada",
                    'getMenus'  => MenuModel::getMenus()
                ];
            }else{
                $response = [
                    'success'   => false,
                    'msg'       => "problemas para Actualizar la información"
                ];
            }
           
             return $response;
        }
        /**ELIMINAR MENU */

        public static function deleteMenuController($id){
            if(MenuModel::deleteMenu($id)){
                $response = [
                    'success'   => true,
                    'msg'       => "Información Eliminada Correctamente",
                    'getMenus'  => MenuModel::getMenus()
                ];
            }else{
                $response = [
                    'success'   => false,
                    'msg'       => "problemas para Eliminar la información"
                ];
            }
            return $response;
        }
        /**OBTENER MENU DB */

        public static function getMenus(){
          return  MenuModel::getMenus();
        }
        /**OBTENER MENU PADRE*/

        public static function getMenuPController($data){
            $validarPadre = MenuModel::getMenus($data);
            if($validarPadre != null){
                $response = [
                    'success'   => true,
                    'msg'       => "Existe Menu",
                ];
            }else{
                $response = [
                    'success'   => false,
                    'msg'       => "Menu No Registrado"
                ];
            }
            return $response;
        }
    }
?>