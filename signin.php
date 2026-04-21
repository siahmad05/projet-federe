<?php
session_start();

// DB CONNECTION
$conn = new mysqli("localhost", "root", "", "moneykids");

if ($conn->connect_error) {
    die("Database connection failed");
}

$error = "";

// LOGIN PROCESS
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // CHECK PARENT
    $parent = $conn->query("SELECT * FROM users_tab WHERE email='$email' AND pw='$password'");

    if ($parent && $parent->num_rows > 0) {

        $data = $parent->fetch_assoc();
        $_SESSION['user_id'] = $data['id'];

        header("Location: EspaceParent.php");
        exit();
    }

    // CHECK CHILD
    $child = $conn->query("SELECT * FROM enfants WHERE email='$email' AND pw='$password'");

    if ($child && $child->num_rows > 0) {

        $data = $child->fetch_assoc();
        $_SESSION['child_id'] = $data['id'];

        header("Location: dashboard.php");
        exit();
    }

    // ERROR MESSAGE
    $error = "Invalid email or password";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In — MoneyKids</title>
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

<!-- FORM SECTION -->
<div class="full-page-center">

    <div class="form-card">

        <h2>Sign In</h2>

        <!-- ERROR MESSAGE -->
        <?php if (!empty($error)) { ?>
            <div class="error-message text-center">
                <?= $error ?>
            </div>
        <?php } ?>

        <!-- LOGIN FORM -->
        <form method="POST">
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Sign In</button>
        </form>

        <p class="text-center mt-20">
            No account yet?<br>
            <a href="signup.php">Sign up</a>
        </p>

    </div>

</div>

</body>
</html>