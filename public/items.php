<?php
require_once '../app/controllers/ItemController.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get the action parameter (default to 'index')
$action = $_GET['action'] ?? 'index';

// Create an instance of the ItemController
$controller = new ItemController();

// Handle different actions based on the 'action' query parameter
switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // If the form is submitted, call the 'add' method with POST data
            $controller->add($_POST);
        } else {
            // Otherwise, render the 'add' form
            require_once '../app/views/items/add.php';
        }
        break;

    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // If the form is submitted, delete the item
            $id = $_POST['id'] ?? null;
            if ($id) {
                $controller->delete($id);
            }
        } else {
            // Otherwise, render the 'delete' form
            require_once '../app/views/items/delete.php';
        }
        break;

    default:
        // Default action is to display the index view
        $controller->index();
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common.css">
    <link rel="stylesheet" href="../theme.css">
    
</head>
<body>
  
    <!-- Page Content will be loaded based on the action selected -->
</body>
</html>
