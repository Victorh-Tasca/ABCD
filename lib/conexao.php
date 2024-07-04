<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$host="localhost";
$db="abcd";
$user="root";
$password="";

$mysqli= new mysqli($host,$user,$password,$db);
if($mysqli->connect_errno){
    echo "Falha ao conectar com a base de dados";
}