<?php

session_start();
include "db_cnn.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];

    //base de dados

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "auth";
    
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }

    //validar Login

    $query =  "SELECT *FROM login WHERe 
    username = '$username' AND password = '$password'";

    $result = $conn->query($query);

    if($result->num_rows == 1){
        //validacao
        exit();
    }
        else{
            //erro login
            exit();
        }

}