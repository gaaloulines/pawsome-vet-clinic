<?php
require_once __DIR__ . '/../app/controllers/CartController.php';

// Start session to check for user authentication
session_start();

// Check the action from the request
$action = $_POST['action'] ?? $_GET['action'] ?? 'view';

// Create an instance of the CartController
$cartController = new CartController();

switch ($action) {
    case 'add':
        // Add an item to the cart (POST request)
        if (!isset($_SESSION['user_id'])) {
            // Redirect to login if the user is not logged in
            header("Location: /projet/login.html");
            exit;
        }

        // Get product details from the POST request
        $productId = $_POST['product_id'] ?? null;
        $quantity = $_POST['quantity'] ?? 1;

        if ($productId) {
            $cartController->addToCart($productId, $quantity);
        } else {
            echo "Error: Product ID is required to add to the cart.";
        }
        break;

    case 'remove':
        // Remove an item from the cart (GET request)
        $productId = $_GET['product_id'] ?? null;

        if ($productId) {
            $cartController->removeFromCart($productId);
        } else {
            echo "Error: Product ID is required to remove from the cart.";
        }
        break;

    default:
        // Show the cart (GET request)
        $cartController->index();
        break;
}
