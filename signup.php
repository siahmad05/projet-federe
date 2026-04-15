<?php

$conn = new mysqli("localhost", "root", "", "moneykids");

$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom     = trim($_POST['nom']);
    $prenom     = trim($_POST['prenom']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $conn->query("
                INSERT INTO users_tab (nom,prenom ,email , pw, user_status)
                VALUES ('$nom','$prenom' ,'$email' ,'$password', 'parent')
            ");
    $success = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up — MoneyKids</title>
</head>
<body>
    <h2>Create Account</h2>

    <?php if ($success): ?>
        <p>Account created! <a href="signin.php">Sign in</a></p>
    <?php else: ?>
        <form method="POST">
            <label>Nom<br>
                <input type="text" name="nom" required>
            </label><br><br>

            <label>Prenom<br>
                <input type="text" name="prenom" required>
            </label><br><br>

            <label>Email<br>
                <input type="email" name="email" required>
            </label><br><br>

            <label>Mot De Passe<br>
                <input type="password" name="password" required>
            </label><br><br>

            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="signin.php">Sign in</a></p>
    <?php endif; ?>
</body>
</html>
