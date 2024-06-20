<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "reglog");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";