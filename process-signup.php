<?php
if(empty($_POST["name"])){
    die("Nome é necessário.");
}

if( !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Email inválido.");
}
if(strlen($_POST["password"]) < 8){
    die("A senha deve ser maior que 8 caracteres.");
}

if (!preg_match("/[a-z]/i", $_POST["password"])){
    die("A senha deve conter pelo menos uma letra.");
}
if (!preg_match("/[0-9]/i", $_POST["password"])){
    die("A senha deve conter pelo menos um número.");
}
if ($_POST["password"] !== $_POST["confirmpassword"]){
    die("As senhas não coincidem.");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";

$stmt = $mysqli-> stmt_init();

if( !$stmt->prepare($sql)) {
    die("SQL erro: " . $mysqli->error);
}

$stmt->bind_param("sss",
                    $_POST["name"],
                    $_POST["email"],
                    $password_hash);
if($stmt->execute()){

header("Location: login2.php");
exit;

}else{
    if($mysqli->errno === 1062){
        die("Esse Email já está em uso.");
    } else{
    die($mysqli->error . " " . $mysqli->errno);
 }
}

#teste de conexão
print_r($_POST);
var_dump($password_hash);