<?php
// If needed, this section can be used for PHP logic, e.g.,
// initializing $data or handling form processing errors.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link rel="stylesheet" href="../../../common.css">
    <link rel="stylesheet" href="../../../theme.css">
 

</head>
<body>
    <header>
        <h1>Add New Product</h1>
    </header>

    <?php if (isset($error)): ?>
        <div class="error-message">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>
    <main>
    <div class="container">
    <div class="services-wrapper">
    <form action="/projet/public/items.php?action=add" method="POST">
    <div class="form-group">
        <label for="name">Item Name:</label>
        <input type="text" id="name" name="name" required placeholder="Enter item name"
            value="<?php echo isset($data['name']) ? htmlspecialchars($data['name']) : ''; ?>">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" required placeholder="Enter item description" rows="4">
            <?php echo isset($data['description']) ? htmlspecialchars($data['description']) : ''; ?>
        </textarea>
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" min="0" required placeholder="Enter price"
            value="<?php echo isset($data['price']) ? htmlspecialchars($data['price']) : ''; ?>">
    </div>
    <div class="form-group">
        <label for="stock">Stock Quantity:</label>
        <input type="number" id="stock" name="stock" min="0" required placeholder="Enter stock quantity"
            value="<?php echo isset($data['stock']) ? htmlspecialchars($data['stock']) : ''; ?>">
    </div>
    <div class="form-actions">
        <button type="submit" class="login-button">Add Item</button>
    </div>
    <div class="back-link">
    <a href="/projet/public/items.php" >Back to Item List</a>
</div>
</form>

    </div>
    </div>
    </main>
</body>
</html>
