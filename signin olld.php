<?php
session_start();
$conn = new mysqli("localhost", "root", "", "moneykids");

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];


    $user=$conn->query("SELECT * FROM users_tab WHERE email='$email' AND pw='$password'");
    

    if ($user) {
        $user_row=$user->fetch_assoc();
        $user_type=$user_row['user_status'];
        $_SESSION['user_id']   = $user_row['id'];
        $_SESSION['user_type'] = $user_row['user_type'];

        
        
        if ($user_type === 'parent') {
            echo $user_type;
            header("Location: EspaceParent.php");
        } else {
            echo $user_type;
            header("Location: dashboard.php");
        }
        exit;
        echo $user->fetch_assoc()['nom'];
    } else {
        $error = "Invalid email or password.";
    }
}














$email = $_POST['email'];
$password = $_POST['password'];

// 1️⃣ Check parent
$parent = $conn->query("SELECT * FROM users_tab WHERE email='$email' AND pw='$password'");

if ($parent->num_rows > 0) {
    $data = $parent->fetch_assoc();

    $_SESSION['user_id'] = $data['id'];
    $_SESSION['role'] = 'parent';

    header("Location: parent_dashboard.php");
    exit();
}

// 2️⃣ If not parent → check child
$child = $conn->query("SELECT * FROM enfants WHERE email='$email' AND pw='$password'");

if ($child->num_rows > 0) {
    $data = $child->fetch_assoc();

    $_SESSION['child_id'] = $data['id'];
    $_SESSION['role'] = 'child';

    header("Location: child_dashboard.php");
    exit();
}

// 3️⃣ If not found anywhere
echo "Email or password incorrect";
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

    <!-- CENTERED FORM -->
    <div class="full-page-center">

        <div class="form-card">
            <h2>Sign In</h2>

            <?php if ($error): ?>
                <div class="error-message text-center">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit">Sign In</button>
            </form>

            <p class="text-center mt-20">
                No account yet? <br>
                <a href="signup.php">Sign up</a>
            </p>
        </div>

    </div>

</body>
</html>
