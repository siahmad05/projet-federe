<?php
session_start();
if(isset($_POST['submit'])) {
    $id=$_SESSION['user_id'] ;
    $name=$_POST['child_name'];
    $email=$_POST['email'];
    $password = $_POST['child_password'];
    $confirm = $_POST['confirm_password'];
    
    if($password != $confirm) {
        echo "<script>alert('Les mots de passe ne correspondent pas !');</script>";
    } else {
        $conn = new mysqli("localhost", "root", "", "moneykids");
        $sql="INSERT INTO enfants (parent,nom,email, pw)
                VALUES ('$id','$name','$email','$password')";
        if ($conn->query($sql)) {
            echo "Data inserted!";
        } else {
        echo "Error: " . $conn->error;
    }
        echo "<script>alert('Compte créé avec succès !');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter compte enfant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<header>
    <nav class="navbar">
        <div class="logo">💰 MoneyKids</div>
        <ul class="nav-links">
            <li><a href="EspaceParent.php">Dashboard</a></li>
            <li><a href="deconnexion.php">Logout</a></li>
        </ul>
    </nav>
</header>

<!-- MAIN -->
<section class="section">
    <div class="container">

        <!-- TITLE -->
        <div class="card text-center">
            <h2>Add Child Account</h2>
            <p class="mt-20">Create a new child profile</p>
        </div>

        <!-- FORM -->
        <div class="card mt-20">
            <form method="POST">

                <input type="text" name="child_name" placeholder="Child Name" required>
                <input type="email" name="email" placeholder="email Name" required>

                <input type="password" name="child_password" placeholder="Password" required>

                <input type="password" name="confirm_password" placeholder="Confirm Password" required>

                <button type="submit" name="submit">Create Account</button>

            </form>
        </div>

        <!-- BACK -->
        <div class="text-center mt-20">
            <a href="EspaceParent.php">← Retour à l'espace parent</a>
        </div>

    </div>
</section>

</body>
</html>