<?php

$host = "br478.hostgator.com.br";
$db = "cami9864_abcd";
$user = "cami9864_caminhodedamasco";
$password = "caminhodedamasco123";

$mysqli = new mysqli($host, $user, $password, $db);

// Verifica se houve algum erro na conexao
if ($mysqli->connect_error) { 
    die("Erro de conexao: " . $mysqli->connect_error);
}

?>