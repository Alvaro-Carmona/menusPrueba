<?php
require_once "conexion.php";

    class MenuModel{
		// REGISTRAR MENU
       public static  function save_menu_model($data){
		$stmt = Conexion::conectar()->prepare("INSERT INTO menu(nombre,menu_padre,descripcion) VALUES (:nombre,:mp,:descripcion)");
		$stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":mp", $data["menuPadre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $data["descripcion"], PDO::PARAM_STR);
        return $stmt->execute();
	
       }
		// OBTENER MENU DB
       public static function getMenus($nombre=null){
            
		if($nombre != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM menu WHERE nombre = :nombre");

			$stmt -> bindParam(":nombre", $nombre);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM menu ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll(PDO::FETCH_ASSOC);

		}

		// $stmt -> close();

		// $stmt = null;

       }
		// ACTUALIZAR MENU
	   public static function updateMenu($data){
		$stmt = Conexion::conectar()->prepare("UPDATE menu SET nombre=:nombre,menu_padre=:mp,descripcion=:descrip WHERE id=:id");
		$stmt->bindParam(":id", $data["id"]);
		$stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":mp", $data["menuPadre"], PDO::PARAM_STR);
		$stmt->bindParam(":descrip", $data["descripcion"], PDO::PARAM_STR);
        return $stmt->execute();
	   }
		// ELIMINAR MENU
	   public static function deleteMenu($id){
		$stmt = Conexion::conectar()->prepare("DELETE FROM menu WHERE id=:id");
		$stmt->bindParam(":id", $id);
        return $stmt->execute();
		
	   }
    }
