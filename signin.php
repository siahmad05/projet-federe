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
        /*$_SESSION['user_id']   = $user_row['id'];
        $_SESSION['user_type'] = $user_row['user_type'];*/

        
        
        if ($user_type === 'parent') {
            echo $user_type;
            //header("Location: parent_dashboard.php");
        } else {
            echo $user_type;
            //header("Location: kid_dashboard.php");
        }
        exit;
        //echo $user->fetch_assoc()['nom'];
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In — MoneyKids</title>
</head>
<body>
    <h2>Sign In</h2>

    <?php if ($error): ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Email<br>
            <input type="email" name="email" required>
        </label><br><br>

        <label>Password<br>
            <input type="password" name="password" required>
        </label><br><br>

        <button type="submit">Sign In</button>
    </form>
    <p>No account yet? <a href="signup.php">Sign up</a></p>
</body>
</html>
