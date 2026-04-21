<?php

$conn = new mysqli("localhost", "root", "", "moneykids");

$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom     = trim($_POST['nom']);
    $prenom     = trim($_POST['prenom']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $conn->query("
                INSERT INTO users_tab (nom,prenom ,email , pw)
                VALUES ('$nom','$prenom' ,'$email' ,'$password')
            ");
    $success = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up — MoneyKids</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- NAVBAR -->
    <header>
        <nav class="navbar">
            <div class="logo">MoneyKids</div>
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <!-- CENTERED FORM -->
    <div class="full-page-center">

        <div class="form-card">
            <h2>Create Account</h2>

            <?php if ($success): ?>
                <div class="success-message text-center">
                    ✓ Account created successfully! <br>
                    <a href="signin.php">Sign in now</a>
                </div>
            <?php else: ?>

                <form method="POST">

                    <input type="text" name="nom" placeholder="First Name" required>
                    <input type="text" name="prenom" placeholder="Last Name" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="password" name="password" placeholder="Password" required>

                    <button type="submit">Sign Up</button>

                </form>

                <p class="text-center mt-20">
                    Already have an account? <br>
                    <a href="signin.php">Sign in here</a>
                </p>

            <?php endif; ?>
        </div>

    </div>

</body>

</html>