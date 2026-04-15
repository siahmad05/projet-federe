<?php
session_start();
$conn = new mysqli("localhost", "root", "", "moneykids");

$id = $_SESSION['user_id'] ?? 1;

if(isset($_POST['add_depense'])){
    $montant = floatval($_POST['montant']);
    $desc = $conn->real_escape_string($_POST['description']);

    if($montant > 0){
        $res = $conn->query("SELECT solde FROM enfants WHERE id = $id");
        $current = $res->fetch_assoc()['solde'];

        if($current >= $montant){
            $conn->query("UPDATE enfants SET solde = solde - $montant WHERE id = $id");

            $conn->query("
                INSERT INTO transactions (enfant_id, type, montant, description)
                VALUES ($id, 'depense', $montant, '$desc')
            ");

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Solde insuffisant ❌";
        }
    }
}

if(isset($_POST['create_objectif'])){
    $titre = $conn->real_escape_string($_POST['titre']);
    $cible = floatval($_POST['montant_cible']);

    if($cible > 0){

        $check = $conn->query("SELECT * FROM objectifs WHERE enfant_id = $id");

        if($check->num_rows == 0){
            $conn->query("
                INSERT INTO objectifs (enfant_id, titre, montant_cible, montant_actuel)
                VALUES ($id, '$titre', $cible, 0)
            ");
        } else {
            $conn->query("
                UPDATE objectifs 
                SET titre='$titre', montant_cible=$cible
                WHERE enfant_id=$id
            ");
        }

        header("Location: dashboard.php");
        exit();
    }
}

$res = $conn->query("SELECT solde FROM enfants WHERE id = $id");
$solde = ($res->num_rows > 0) ? $res->fetch_assoc()['solde'] : 0;

$res2 = $conn->query("SELECT * FROM objectifs WHERE enfant_id = $id LIMIT 1");
$objectif = ($res2->num_rows > 0) ? $res2->fetch_assoc() : null;

$transactions = $conn->query("SELECT * FROM transactions WHERE enfant_id = $id ORDER BY date DESC");


$progress = 0;
if($objectif && $objectif['montant_cible'] > 0){
    $progress = ($objectif['montant_actuel'] / $objectif['montant_cible']) * 100;
    if($progress > 100) $progress = 100;
}

if($objectif && $objectif['montant_actuel'] >= $objectif['montant_cible']){
    $check = $conn->query("
        SELECT * FROM recompenses 
        WHERE enfant_id = $id AND titre = 'Objectif atteint'
    ");

    if($check->num_rows == 0){
        $conn->query("
            INSERT INTO recompenses (enfant_id, titre, description, obtenue)
            VALUES ($id, 'Objectif atteint ', 'Bravo tu as atteint ton objectif ', 1)
        ");
    }
}


$res7 = $conn->query("
SELECT COUNT(DISTINCT DATE(date)) as jours
FROM transactions
WHERE enfant_id = $id 
AND type = 'revenu'
AND date >= DATE_SUB(NOW(), INTERVAL 7 DAY)
");

$data = $res7->fetch_assoc();

if($data['jours'] >= 7){
    $check = $conn->query("
        SELECT * FROM recompenses 
        WHERE enfant_id = $id AND titre = '7 jours épargne'
    ");

    if($check->num_rows == 0){
        $conn->query("
            INSERT INTO recompenses (enfant_id, titre, description, obtenue)
            VALUES ($id, '7 jours épargne', 'Tu as économisé pendant 7 jours', 1)
        ");
    }
}

/
$rewards = $conn->query("SELECT * FROM recompenses WHERE enfant_id = $id ORDER BY date_obtenue DESC");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Enfant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <a href="logout.php">Déconnexion</a>
</header>

<div class="dashboard">

<h2>Bienvenue</h2>
<div class="card">
    <h3>Solde</h3>
    <p><?= $solde ?> TND</p>
</div>


<div class="card">
    <h3>Objectif</h3>

    <?php if($objectif): ?>
        <p><?= $objectif['titre'] ?> (<?= $objectif['montant_cible'] ?> TND)</p>

        <div class="progress-bar">
            <div class="progress" style="width: <?= $progress ?>%"></div>
        </div>

        <p><?= round($progress) ?>%</p>

    <?php else: ?>
        <p>Aucun objectif</p>
    <?php endif; ?>
</div>

<div class="card">
    <h3>Créer Objectif</h3>

    <form method="POST">
        <input type="text" name="titre" placeholder="Nom objectif" required>
        <input type="number" name="montant_cible" placeholder="Montant cible" required>
        <button type="submit" name="create_objectif">Créer</button>
    </form>
</div>

<div class="card">
    <h3>Ajouter Dépense</h3>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="number" name="montant" placeholder="Montant" required>
        <input type="text" name="description" placeholder="Description" required>
        <button type="submit" name="add_depense">Ajouter</button>
    </form>
</div>


<div class="card">
    <h3>Transactions</h3>

    <ul>
        <?php while($t = $transactions->fetch_assoc()): ?>
            <li>
                <?= $t['type'] == 'depense' ? '-' : '+' ?>
                <?= $t['montant'] ?> TND
                (<?= $t['description'] ?>)
                <br>
                <small><?= $t['date'] ?></small>
            </li>
        <?php endwhile; ?>
    </ul>
</div>


<div class="card">
    <h3>Mes Récompenses</h3>

    <ul>
        <?php while($r = $rewards->fetch_assoc()): ?>
            <li>
                <strong><?= $r['titre'] ?></strong><br>
                <small><?= $r['description'] ?></small><br>
                <small><?= $r['date_obtenue'] ?></small>
            </li>
        <?php endwhile; ?>
    </ul>
</div>

</div>

</body>
</html>