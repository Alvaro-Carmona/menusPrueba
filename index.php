<?php
    require_once 'controllers/MenuController.php';
    require_once 'controllers/EnlacesController.php';
    
    require_once 'models/EnlacesModel.php';

    $inicio = new MenuController();
    $inicio->template();

?>