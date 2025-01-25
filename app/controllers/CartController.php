<?php
require_once __DIR__ . '/../models/Item.php';
require_once __DIR__ . '/BaseController.php';

class CartController extends BaseController {

    public function index() {
        $cartItems = self::getCartItems();
        $products = Item::getAll();
        $total = 0;

        $cartDetails = [];
        foreach ($cartItems as $productId => $quantity) {
            foreach ($products as $product) {
                if ($product['id'] == $productId) {
                    $subtotal = $product['price'] * $quantity;
                    $total += $subtotal;

                    $cartDetails[] = [
                        'id' => $product['id'],
                        'name' => $product['name'],
                        'price' => $product['price'],
                        'quantity' => $quantity,
                        'subtotal' => $subtotal
                    ];
                }
            }
        }

        $this->render('cart/Cart.php', [
            'cartDetails' => $cartDetails,
            'total' => $total
        ]);
    }

    public static function getCartItems() {
        if (!isset($_COOKIE['cart'])) {
            return [];
        }
        return json_decode($_COOKIE['cart'], true);
    }

    public static function addToCart($productId, $quantity) {
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }
        setcookie('cart', json_encode($cart), time() + (86400 * 30), '/');
        header("Location: /projet/public/items.php?message=added");
        exit;
    }

    public static function handleCartAction() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /projet/login.html");
            exit;
        }
        if ($_POST['action'] === 'add' && isset($_POST['product_id'], $_POST['quantity'])) {
            $productId = intval($_POST['product_id']);
            $quantity = intval($_POST['quantity']);
            self::addToCart($productId, $quantity);
        }
    }

    public static function removeFromCart($productId) {
        if (isset($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart'], true);
            unset($cart[$productId]);
            setcookie('cart', json_encode($cart), time() + (86400 * 30), '/');
        }
        header("Location: /projet/public/cart.php");
        exit;
    }
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