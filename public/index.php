<?php
    use App\Controllers\AuthController;
    use App\Core\Router;
    use App\Controllers\IndexController;

    require_once "../bootstrap.php";
    

    session_start();

    if (!isset($_SESSION['perfil'])) {
        $_SESSION['perfil'] = "invitado";
    }

    $router = new Router();
    $router->add(array(
        "name" => "home", // Nombre de la ruta
        "path" => "/^\/$/", // Expresión regular con la que extraemos la ruta de la URL
        "action" => [IndexController::class, "indexAction"], // Clase y metedo que se ejecuta cuando se busque esa ruta
        "auth" => ["invitado", "usuario"]) // Perfiles de autenticación que pueden acceder
    );

    $router->add(array(
        "name" => "Login",
        "path" => "/^\/login$/", 
        "action" => [AuthController::class, "loginAction"], 
        "auth" => ["invitado"])
    );

    $router->add(array(
        "name" => "Logout",
        "path" => "/^\/logout$/", 
        "action" => [AuthController::class, "logoutAction"], 
        "auth" => ["usuario"])
    );

    $router->add(array(
        "name" => "register",
        "path" => "/^\/register$/", 
        "action" => [AuthController::class, "registerAction"], 
        "auth" => ["invitado"])
    );

    $request = $_SERVER['REQUEST_URI']; // Recoje URL
    $route = $router->match($request); // Busca en todas las rutas hasta encontrar cual coincide con la URL
    
    if ($route) {
        if (in_array($_SESSION['perfil'], $route['auth'])) {
            $className = $route['action'][0];
            $classMethod = $route['action'][1];
            $object = new $className;
            $object->$classMethod($request);
        } else {
            header("Location: /");
        }
    } else {
        exit(http_response_code(404));
    }
