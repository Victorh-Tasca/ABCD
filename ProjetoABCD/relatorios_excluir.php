<?php
include('lib/conexao.php');

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    die('<p class="error">Erro ao logar, volte a página de <a href="login.php">login</a> para iniciar uma sessão</p>');
}
$id = intval($_GET['id']);
$sql_code = "SELECT* FROM administrador WHERE id='$id'";
$sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
$doc = $sql_exec->fetch_assoc(); //não faz loop porque é só um usuário
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Deletar Arquivo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style2.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="javascript/script.js"></script>
    </head>

    <body>

        <div class="menu-lateral">
            <div class="imagem-menu-lateral">
                <a href="submeter_arquivo.php">
                    <img src="img/logo_adm.png" alt=""/></a>
            </div>
            <div class="links-menu-lateral">
                <ul>
                    <li><a href="submeter_arquivo.php">Início</a></li>
                    <li><a href="meus_dados.php">Meus dados</a></li>
                    <li><a href="parcerias_listagem.php">Parcerias</a></li>
                    <li><a href="administracao_listagem.php">Administração</a></li>
                    <li><a href="contabilidade_listagem.php">Contabilidade</a></li>
                    <li><a href="documentos_listagem.php" >Documentos</a></li>
                    <li><a href="planoacao_listagem.php">Plano de Ação</a></li>
                    <li><a href="regularidadefiscal_listagem.php">Regularidade Fiscal</a></li>
                    <li><a href="relatoriosatividade_listagem.php">Relatórios</a></li>
                    <li><a href="listagem_contato.php" >Contato</a></li>
                    <li><a href="listagem_usuario.php">Usuários</a></li>
                    <li><a href="cadastro_usuario_1.php">Cadastrar Usuário</a></li>


                </ul>
            </div>
            <div class="icons-menu-lateral">
                <a href="destruir_sessao.php">               
                    <img src="img/logout.png" alt=""/></a>
            </div>
        </div>
        <div class="fora-menu">
            <section class=formulário>
            <div class="descricao">
                <h2>Deletar Arquivo</h2>
                <p>Escolha uma das opções abaixo para deletar ou não documento no sistema da ABCD.</p>
            </div>
            <form action="" method="POST">
                <div class="secao-row">
            <button type="submit" name="sim" id="deletar">Sim</button>
                </div>
        </form>
                        <a href="administracao_listagem.php"> <button type="submit" >Não</button></a>

            </section>
                        </div>
                      
                    <?php

                    if (count($_POST) > 0) {
                        if (isset($_POST['sim'])) {
               
                
                            
                                    $sql_code = "DELETE FROM arquivo WHERE id='$id'";
                                    $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
                                    if ($deu_certo) {
                                        echo '<p class="certo">Documento deletado com sucesso, <a href="relatoriosatividade.php">voltar</a> para página de listagem</p>';
                                        unset($_POST);
                                        die();
                                    } else {
                                        echo '<p class="error">Erro ao deletar o documento</p>';
                                    }
                                }
                            } 
                    ?>
                    </body>
                    </html>