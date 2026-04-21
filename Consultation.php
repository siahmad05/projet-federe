<?php
session_start();

$conn = new mysqli("localhost", "root", "", "moneykids");

if ($conn->connect_error) {
    die("Database connection failed");
}

$id = $_SESSION['user_id'] ?? 0;

$search_result = "";
$balance = 0;

if (isset($_POST['search'])) {

    $child_id = $_POST['child_id'];

    $query = $conn->query("SELECT nom, solde FROM enfants WHERE id='$child_id' AND parent='$id'");

    if ($row = $query->fetch_assoc()) {
        $search_result = "Balance for: " . $row['nom'];
        $balance = $row['solde'];
    } else {
        $search_result = "Child not found";
        $balance = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balance Consultation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <nav class="navbar">
        <div class="logo">💰 MoneyKids</div>
        <ul class="nav-links">
            <li><a href="EspaceParent.php">Dashboard</a></li>
            <li><a href="deconnexion.php">Logout</a></li>
        </ul>
    </nav>
</header>

<section class="section">
    <div class="container">

        <div class="card text-center">
            <h2>Balance Consultation</h2>
            <p class="mt-20">Check your child's balance easily</p>
        </div>

        <div class="card mt-20">
            <form method="POST">

                <label style="display:block; text-align:left; margin-bottom:8px;">
                    Select Child
                </label>

                <select name="child_id" required>
                    <?php
                    $result = $conn->query("SELECT * FROM enfants WHERE parent='$id'");
                    while($row = $result->fetch_assoc()){
                        echo "<option value='{$row['id']}'>{$row['nom']}</option>";
                    }
                    ?>
                </select>

                <button type="submit" name="search">Search</button>

            </form>
        </div>

        <?php if(isset($_POST['search'])): ?>
        <div class="card mt-20 text-center">

            <p><?= $search_result; ?></p>

            <h2 class="balance-amount">
                <?= number_format($balance, 2); ?> €
            </h2>

            <p>Current balance</p>

        </div>
        <?php endif; ?>

        <div class="text-center mt-20">
            <a href="EspaceParent.php">← Back to parent dashboard</a>
        </div>

    </div>
</section>

</body>
</html>