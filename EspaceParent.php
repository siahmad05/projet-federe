<?php

if(isset($_POST['submit'])) {
    $child_name = $_POST['child_name'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    echo "<script>alert('$amount € assigned to $child_name!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Dashboard - MoneyKids</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR (same style as other pages) -->
<header>
    <nav class="navbar">
        <div class="logo">💰 MoneyKids</div>
        <ul class="nav-links">
            <li><a href="deconnexion.php">Logout</a></li>
        </ul>
    </nav>
</header>

<!-- MAIN CONTENT -->
<section class="section">
    <div class="container">

        <!-- TITLE -->
        <div class="card text-center">
            <h2>Parent Dashboard</h2>
            <p class="mt-20">Manage your children's finances easily</p>
        </div>

        <!-- ACTIONS -->
        <div class="grid mt-20">

            <a href="AddChild.php" class="card func-card">
                <h3>👶 Add Child</h3>
                <p>Create a new child account</p>
            </a>

            <a href="Attribution.php" class="card func-card">
                <h3>💸 Assign Money</h3>
                <p>Give allowance or rewards</p>
            </a>

            <a href="Consultation.php" class="card func-card">
                <h3>📊 Check Balance</h3>
                <p>Track spending and savings</p>
            </a>

        </div>

       
    </div>
</section>

</body>
</html>