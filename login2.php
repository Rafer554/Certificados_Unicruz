<?php
$is_invalid = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){

    $mysqli = require __DIR__. "/database.php";

    $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if($user){
        
if( password_verify($_POST["password"], $user["password_hash"])){


    session_start();

    session_regenerate_id();

    $_SESSION["user_id"] = $user["id"];
   
    header("Location: index.php");
    exit;
        }
    }

    $is_invalid = true;
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
        <title> Logar em Unicruz Certificados </title>
        
</head>



<body>


<?php if ($is_invalid) : 
    ?>
    <em> Login inválido.</em>
<?php endif;
    ?>

<form method = "post">
    <input type = "email" name="email" id="email"
    value ="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

    <input type="password" name="password" id="password">

    <button> Logar</button>
</form>

</body>