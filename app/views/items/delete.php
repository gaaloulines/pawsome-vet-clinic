<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    
</head>
<body>
    <header>
        <h1>Delete a Product</h1>
        
    </header>
    <main>
        <div class="container">
            <form action="/projet/public/items?action=delete" method="POST" class="form-style">
                <label for="id">Product ID:</label>
                <input type="number" id="id" name="id" required>
                <button type="submit" class="button-danger">Delete Product</button>
            </form>
        </div>
    </main>
</body>
</html>
