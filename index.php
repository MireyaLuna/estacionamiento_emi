<?php
    require_once "Config/Config.php";
    if(!empty($_GET['url'])){
        $ruta = $_GET['url'];
    }else{
        $ruta = "Home/index";
    }
    $array = explode("/", $ruta);
    // Array ( [0] => Usuarios [1] => index [2] => 8 )
    //        Control           Metdod      Parametros
    // print_r($array);
    $controller = $array[0];
    $metodo = "index";
    $parametro = "";
    if (!empty($array[1])) {
        if (!empty($array[1]!="")) {
            $metodo = $array[1];
        }
    }
    if (!empty($array[2])) {
        if (!empty($array[2]!="")) {
            for ($i=2; $i < count($array) ; $i++) { 
                $parametro .= $array[$i]. ",";
            }
            $parametro = trim($parametro, ",");
        }
    }
    require_once "Config/App/autoload.php";
    $dirControllers = "Controllers/".$controller.".php";
    if (file_exists($dirControllers)) {
        require_once $dirControllers;
        $controller = new $controller();
        if (method_exists($controller, $metodo)) {
            $controller->$metodo($parametro);
        }else{
            echo "No existe el metodo";
            // header('Location: '.base_url.'Errors');
        }
    }else{
        echo "No existe el controlador";
        // header('Location: '.base_url.'Errors');
    }
?>