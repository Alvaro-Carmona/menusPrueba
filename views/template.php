<?php
require_once 'controllers/MenuController.php';
require_once 'models/MenuModel.php';

$getMenus = json_encode(MenuController::getMenus());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>

    <!-- CSS -->
    <link href="views/public/src/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="views/public/src/assets/libs/datatables/media/css/fixedColumns.dataTables.min.css" rel="stylesheet">
    <link href="views/public/src/assets/libs/datatables/media/css/keyTable.dataTables.min.css" rel="stylesheet">
    
    <link href="views/public/dist/css/style.min.css" rel="stylesheet">
    <link href="views/public/dist/css/global/style.css?v=<?php echo (rand()); ?>" rel="stylesheet">

    <!-- //se recibe la informacion de los menus en BD -->

    <script> var getMenus = <?php echo $getMenus; ?>;</script>
    
    
    
</head>

<body>

    <div class="container-fluid">
        <?php
            $modulos = new Enlaces();
            $modulos->enlacesController();
        ?>
    </div>

    <!-- scripts -->
    <script src="views/public/src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="views/public/src/assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="views/public/src/assets/libs/datatables/media/js/dataTables.fixedColumns.min.js"></script>
    <script src="views/public/src/assets/libs/datatables/media/js/dataTables.keyTable.min.js"></script>
    <script src="views/public/src/assets/libs/datatables/media/js/datetime-moment.js"></script>
    <script src="views/public/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


    <script src="views/public/dist/js/libs/sweetalert2/sweetalert2@11.js"></script>
    <script src="views/public/dist/js/pages/datatable/custom-datatable.js"></script>
    <script src="views/public/dist/js/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="views/public/dist/js/libs/datatables/jszip.min.js"></script>
    <script src="views/public/dist/js/libs/datatables/buttons.html5.min.js"></script>


    <!-- scripts menu  -->
    <script src="views/js/inicio.js"></script>
</body>

</html>