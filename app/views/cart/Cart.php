<?php
// This file is expected to be rendered via BaseController::render().
// The controller should pass $cartDetails and $total to the view.

if (!isset($cartDetails) || !isset($total)) {
    echo "<p>Error: Cart details are missing.</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="../../../common.css">
    <link rel="stylesheet" href="../../../theme.css">
</head>
<body>
    <header>
        <h1>Your Cart</h1>
    </header>

    <div class="container">
    <div class="services-wrapper">
        <?php if (empty($cartDetails)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartDetails as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td><?= htmlspecialchars($item['quantity']) ?></td>
                            <td>$<?= htmlspecialchars(number_format($item['price'], 2)) ?></td>
                            <td>$<?= htmlspecialchars(number_format($item['subtotal'], 2)) ?></td>
                            <td>
                                <!-- Remove product link -->
                                <a href="/projet/public/cart.php?action=remove&product_id=<?= urlencode($item['id']) ?>">Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3>Total: $<?= htmlspecialchars(number_format($total, 2)) ?></h3>
        <?php endif; ?>
    </div>
    </div>
</body>
</html>
