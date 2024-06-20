<?php

session_start();

if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();    
}

?>

<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,9">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<html> 
<head>
    </div>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="Imagens CSS HTML/tabicon.ico" type="image/x-icon">
        <title> HOME </title>
        
</head>

<body>
    <?php if (isset($user)): ?>

        <p>Hello, <?= htmlspecialchars($user["name"]) ?></p>

        <p><a href="logout.php"> Deslogar. </a></p>

    <?php else: ?>

        <p><a href= "login2.php"> Logar</a> ou <a href="signup.html"> Registrar </a></p>
        
    <?php endif; ?>

</body>
</html>