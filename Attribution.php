<?php
session_start();
$conn = new mysqli("localhost", "root", "", "moneykids");
$id=$_SESSION['user_id'] ;

if ($conn->connect_error) {
    die("Database connection failed");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $child_id = $_POST["child_id"];
    $amount = $_POST["amount"];
    $desc = $_POST["description"];

    // ADD MONEY
    $conn->query("
        UPDATE enfants 
        SET solde = solde + $amount 
        WHERE id = $child_id
    ");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Allocation</title>
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
            <h2>Money Allocation</h2>
            <p class="mt-20">Assign money to a child</p>
        </div>

        <!-- FORM -->
        <div class="card mt-20">
            <form method="POST">
                <label for="child_id" style="display:block; text-align:left; margin-bottom:8px;">Select Child</label>
                <select name="child_id" required>
    <?php
    $result = $conn->query("SELECT * FROM enfants where parent='$id'");
    while($row = $result->fetch_assoc()){
        echo "<option value='{$row['id']}'>{$row['nom']}</option>";
    }
    ?>
</select>


                <input type="number" name="amount" step="0.01" placeholder="Amount (€)" required>

                <input type="text" name="description" placeholder="Description (e.g. reward)" required>

                <button type="submit" name="submit">Assign Money</button>

            </form>
        </div>

        <!-- BACK -->
        <div class="text-center mt-20">
            <a href="EspaceParent.php">← Back to Parent Dashboard</a>
        </div>

    </div>
</section>

</body>
</html>