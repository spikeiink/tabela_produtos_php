<?php
$host = "localhost";  
$username = "root";         
$password = "";             
$bancodedados = "loja";    


$conn = new mysqli($host, $username, $password, $bancodedados);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
