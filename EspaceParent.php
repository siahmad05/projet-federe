<?php

 if(isset($_POST['submit'])) {
    $child_name = $_POST['child_name'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    

    echo "<script>alert('$amount € attribué à $child_name !');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>espace parent</title>

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
        
        .login-btn a:hover {
            background-color: #D9DAD9;
            color: #4C8055;
        }
        
        .container {
            max-width: 500px;
            margin: 100px auto;
            padding: 0 20px;
        }
        
        .functions {
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }
        
        .func-btn {
            background-color: #4C8055;
            color: #D9DAD9;
            border: 2px solid #68A4A5;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            width: 300px;
        }
        
        .func-btn:hover {
            background-color: #68A4A5;
            color: white;
            border-color: #4C8055;
            transform: scale(1.02);
        }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 40px;
            color: #4C8055;
            text-decoration: none;
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
            <a href="deconnexion.php">Déconnexion</a>
        </div>
    </div>
    
    <div class="container">
        <div class="functions">
            <a href="AddChild.php" class="func-btn">Ajouter compte enfant</a>
            <a href="Attribution.php" class="func-btn">Attribution d'argent</a>
            <a href="Consultation.php" class="func-btn">Consultation solde</a>
        </div>
        
        <a href="index.php" class="back-link">← Retour à l'accueil</a>
    </div>

    
</body>
</html>