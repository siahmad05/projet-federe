<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #D9DAD9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .confirm-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            max-width: 400px;
        }
        
        h2 {
            color: #4C8055;
            margin-bottom: 20px;
        }
        
        p {
            color: #333;
            margin-bottom: 30px;
            font-size: 18px;
        }
        
        .btn-yes {
            background-color: #4C8055;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            margin-right: 10px;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-no {
            background-color: #68A4A5;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-yes:hover {
            background-color: #3a6641;
        }
        
        .btn-no:hover {
            background-color: #4C8055;
        }


    </style>


</head>
<body>

    <div class="confirm-box">
        <h2>🔓 Déconnexion</h2>
        <p>Êtes-vous sûr de vouloir vous déconnecter ?</p>
        
        <a href="index.php" class="btn-yes">Oui, me déconnecter</a>
        <a href="EspaceParent.php" class="btn-no">Non, retourner</a>
    </div>
    
</body>
</html>