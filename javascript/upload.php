<?php

function enviar($error, $size, $name, $tmp_name) {
    if ($error) {
        die('<p style="color:red;font-weight:bold">Falha ao enviar</p>');
    }
    if ($size > 6000000) {
        die('<p style="color:yellow;background-color:red">Arquivo muito grande. No máximo 6M</p>');
    }
    //var_dump($_FILES['arquivos']);-onde consultar prorpiedades como name, size, error pois estão dentro do array FILES
    $pasta = "arquivos/";
    $nome_original_arquivo = $name;
    $novo_nome_arquivo = uniqid();
    $extensao = strtolower(pathinfo($nome_original_arquivo, PATHINFO_EXTENSION));
    if ($extensao != 'pdf') {
        die('<p style="color:blue;background-color:red">EXTENSÃO NÃO SUPORTADA</p>');
    }
    $path = $pasta . $novo_nome_arquivo . "." . $extensao;
    $deucerto = move_uploaded_file($tmp_name, $path);
    if($deucerto){
        return $path;//retorna o caminho para inserção no banco de dados
    }else{
        return false;
    }
    
}