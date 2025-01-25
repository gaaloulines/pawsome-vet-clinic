<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Pawsome Vet Clinic</title>
    <link rel="stylesheet" href="/projet/public/list.css">

   
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/projet/index.html"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="/projet/services.html"><i class="fas fa-stethoscope"></i> Services</a></li>
                <li><a href="/projet/tips.html"><i class="fas fa-paw"></i> Pet Care Tips</a></li>
                <li><a href="/projet/diseases.html"><i class="fas fa-heartbeat"></i> Cat Diseases</a></li>
                <li><a href="/projet/public/items.php" class="active"><i class="fas fa-heartbeat"></i> Our Products</a></li>
                <li class="login-button">
                    <a href="/projet/login.html"><i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
            </ul>
        </nav>
        <nav class="action-bar">
            <a href="/projet/app/views/items/add.php" class="button-primary">Add Product</a>
            <a href="/projet/public/items?action=delete" class="button-danger">Delete Product</a>
            <a href="/projet/public/cart.php" class="button-secondary">Go to Cart</a>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="services-wrapper">
                <?php foreach ($products as $product): ?>
                    <div class="service-card">
                        <h2><?= htmlspecialchars($product['name']); ?></h2>
                        <p><?= htmlspecialchars($product['description']); ?></p>
                        <p><strong>Price:</strong> $<?= htmlspecialchars(number_format($product['price'], 2)); ?></p>
                        <p><strong>Stock:</strong> <?= htmlspecialchars($product['stock']); ?> available</p>

                        <!-- Add to Cart Form -->
                        <form action="/projet/public/cart.php" method="POST" style="margin-top: 10px;">
                            <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']); ?>">
                            <input type="hidden" name="action" value="add">

                            <!-- Quantity Input -->
                            <input 
                                type="number" 
                                name="quantity" 
                                value="1" 
                                min="1" 
                                max="<?= htmlspecialchars($product['stock']); ?>" 
                                class="quantity-input"
                            >

                            <!-- Add to Cart Button -->
                            <button type="submit" class="add-to-cart-button">Add to Cart</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</body>
</html>
