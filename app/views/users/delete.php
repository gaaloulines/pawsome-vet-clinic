<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>
<body>
    <form action="/projet/public/users.php?action=delete" method="POST">
        <label for="id">User ID:</label>
        <input type="number" id="id" name="id" required>
        <button type="submit">Delete User</button>
    </form>
</body>
</html>
