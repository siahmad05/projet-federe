<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attribution d'argent</title>

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
        
        input, select {
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
        <h2 style="color:#4C8055; text-align:center;">Attribution d'argent</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Nom de l'enfant :</label>
                <input type="text" name="child_name" placeholder="Nom de l'enfant" required>
            </div>
            
            <div class="form-group">
                <label>Montant (€) :</label>
                <input type="number" name="amount" step="0.01" placeholder="0.00" required>
            </div>
            
            <div class="form-group">
                <label>Description :</label>
                <input type="text" name="description" placeholder="Ex: Argent de poche, cadeau, récompense" required>
            </div>
            
            <button type="submit" name="submit">Attribuer l'argent</button>
        </form>
        
        <a href="EspaceParent.php" class="back-link">← Retour à l'espace parent</a>
    </div>
    
</body>
</html>