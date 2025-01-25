<?php
require_once '../app/controllers/UserController.php';

$action = $_GET['action'] ?? 'index';
$controller = new UserController();

switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->add($_POST);
        } else {
            require_once '../app/views/users/add.php';
        }
        break;

    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $controller->delete($id);
        } else {
            require_once '../app/views/users/delete.php';
        }
        break;

    case 'register':
        $controller->register();
        break;

    case 'login':
        $controller->login();
        break;

    default:
        echo "Invalid action.";
}
