<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Pawsome Vet Clinic' ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Tufuli&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../common.css">
    <link rel="stylesheet" href="../../theme.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="/services.php"><i class="fas fa-stethoscope"></i> Services</a></li>
                <li><a href="/public/items.php"><i class="fas fa-shopping-basket"></i> Products</a></li>
                <li class="login-button"><a href="/login.html"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?= $content ?? '' ?> <!-- Dynamic content will be injected here -->
    </main>

    <footer>
        <p>&copy; 2023 Pawsome Vet Clinic. All rights reserved.</p>
    </footer>
</body>
</html>
