<?php

include("lib/conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $sql_code_doc = "SELECT path FROM arquivo WHERE id='$id'";
    $sql_exec = $mysqli->query($sql_code_doc) or die($mysqli->error);
    $doc = $sql_exec->fetch_assoc();

    $sql_code = "DELETE FROM arquivo WHERE id='$id'";
    $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
    if ($deu_certo) {
        if (!empty($doc['path'])) {
            unlink($doc['path']); //unlink serve para excluir da pasta raiz
        }
        echo json_encode(['success' => true, 'message' => 'Arquivo deletado com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao deletar o arquivo.']);
    }
}
?>
