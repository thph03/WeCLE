<?php
require_once 'config/database.php';

spl_autoload_register(function ($class) {
    $path = "controllers/" . $class . ".php";
    if (file_exists($path)) {
        require_once $path;
    }
});

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

// Chuyển tên controller thành PascalCase + "Controller"
$controller = ucfirst(strtolower($controller)) . 'Controller';
$controllerPath = "controllers/{$controller}.php";

if (file_exists($controllerPath)) {
    $controllerInstance = new $controller();

    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action($id);
    } else {
        http_response_code(404);
        echo "Không tìm thấy action: $action trong controller $controller";
    }
} else {
    http_response_code(404);
    echo "Không tìm thấy controller: $controller";
}