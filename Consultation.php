<?php
// database code here to see the child's balance
$search_result = "";
$child_name = "";
$balance = 0;

if(isset($_POST['search'])) {
    $child_name = $_POST['child_name'];
    //  database query  to get balance
    $search_result = "Recherche du solde pour : " . $child_name;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation solde</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #D9DAD9;
        }
        
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin: 30px 0;
        }
        
        .logo-text {
            font-size: 50px;
            background-color: #4C8055;
            color: white;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #68A4A5;
        }
        
        h1 {
            color: #4C8055;
            text-align: center;
            margin: 0;
            font-size: 48px;
        }
        
        .toolbar {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        
        .login-btn a {
            background-color: #68A4A5;
            color: white;
            text-decoration: none;
            padding: 10px 25px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            display: inline-block;
        }
        
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #4C8055;
            font-weight: bold;
        }
        
        input {
            width: 100%;
            padding: 10px;
            border: 2px solid #68A4A5;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }
        
        button {
            background-color: #4C8055;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
        }
        
        button:hover {
            background-color: #68A4A5;
        }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4C8055;
            text-decoration: none;
        }
        
        .result-box {
            margin-top: 30px;
            padding: 20px;
            background-color: #4C8055;
            color: white;
            border-radius: 10px;
            text-align: center;
        }
        
        .balance-amount {
            font-size: 36px;
            font-weight: bold;
            margin: 10px 0;
        }

    </style>


</head>
<body>

    <div class="header">
        <div class="logo-text">💰</div>
        <h1>MoneyKids</h1>
    </div>
    
    <div class="toolbar">
        <div class="login-btn">
            <a href="EspaceParent.php">← Retour</a>
        </div>
    </div>
    
    <div class="container">
        <h2 style="color:#4C8055; text-align:center;">Consultation solde</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Nom de l'enfant :</label>
                <input type="text" name="child_name" placeholder="Entrez le nom de l'enfant" required>
            </div>
            
            <button type="submit" name="search">Rechercher</button>
        </form>
        
        <?php if(isset($_POST['search'])): ?>
        <div class="result-box">
            <p><?php echo $search_result; ?></p>
            <div class="balance-amount"><?php echo number_format($balance, 2); ?> €</div>
            <p>Solde actuel</p>
        </div>
        <?php endif; ?>
        
        <a href="EspaceParent.php" class="back-link">← Retour à l'espace parent</a>
    </div>
    
</body>
</html>