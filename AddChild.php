<?php

if(isset($_POST['submit'])) {
    $password = $_POST['child_password'];
    $confirm = $_POST['confirm_password'];
    
    if($password != $confirm) {
        echo "<script>alert('Les mots de passe ne correspondent pas !');</script>";
    } else {
        // Passwords match - partners will add database code here
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
        
        .success {
            background-color: #4C8055;
            color: white;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
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
        <h2 style="color:#4C8055; text-align:center;">Ajouter un enfant</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Nom de l'enfant :</label>
                <input type="text" name="child_name" required>
            </div>
            
            <div class="form-group">    
                <label>Mot de passe :</label>
                <input type="password" name="child_password" required>
            </div>

             <div class="form-group">
                <label>Confirmer le mot de passe :</label>
                <input type="password" name="confirm_password" required>
            </div>
            
            <button type="submit" name="submit">Créer le compte</button>
        </form>
        
        <a href="EspaceParent.php" class="back-link">← Retour à l'espace parent</a>
    </div>
    
</body>
</html>