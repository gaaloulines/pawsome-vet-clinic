<?php
require_once __DIR__ . '/../models/Item.php';

class ItemController {
    public function index() {
        // Fetch all products
        $products = Item::getAll();
        
        // Direct include of view with passed data
        require_once __DIR__ . '/../views/items/list.php';
    }

    public function add($data = null) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process form data
            if (isset($data['name'], $data['description'], $data['price'], $data['stock'])) {
                Item::add($data['name'], $data['description'], $data['price'], $data['stock']);
                // Redirect to items list after successful add
                header('Location: /projet/public/items.php');  // Relative path to current script
                exit;
            } else {
                // Pass error to view
                $error = 'All fields are required.';
                require_once __DIR__ . '/../views/items/add.php';
            }
        } else {
            // Render the add form
            require_once __DIR__ . '/../views/items/add.php';
        }
    }

    public function delete($id) {
        if ($id) {
            // Delete the product by ID
            Item::delete($id);
        }
        
        // Redirect back to the items list after deleting
        header('Location: /projet/public/items.php'); // Relative path to current script
        
        exit;
    }
}
