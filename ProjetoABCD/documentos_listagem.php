<?php
include('lib/conexao.php');

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    die('<p class="error">Erro ao logar, volte a página de <a href="login.php">login</a> para iniciar uma sessão</p>');
    //não faz loop porque é só um usuário
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Listagem de Documentos - Documentos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style2.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="javascript/script.js"></script>
    </head>

    <body>

        <div class="menu-lateral">
            <div class="imagem-menu-lateral">
                <img src="img/logo_adm.png" alt=""/>
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
                    <img src="img/logout.png" alt=""/>
                </a>
            </div>
        </div>
        <div class="fora-menu">
            <div class="listagem-arquivos">
                <h2>Listagem de Documentos</h2>
                <h3>Documentos</h3>
                <?php
                include ("lib/conexao.php");
                $sql_code = "SELECT * FROM arquivo WHERE id_categoria= 4";
                $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
                $sql_listagem = $sql_exec->num_rows;
                $id = $_SESSION['usuario'];
                $sql_code_2 = "SELECT * FROM administrador WHERE id='$id'";
                $sql_exec_2 = $mysqli->query($sql_code_2) or die($mysqli->error);
                $usuario = $sql_exec_2->fetch_assoc();
                ?>
                <table border="5">
                    <thead>
                    <th>ID</th>
                    <th>Título do Documento</th>
                    <th>Descrição</th>
                    <th>Data de Submissão</th>
                    <th>Arquivo</th>
                    <?php
                    if ($usuario['privilegio'] == 1) {
                        ?>
                        <th>Comandos</th>
                    <?php } ?>
                    </thead>
                    <tbody>
                        <?php
                        if ($sql_listagem == 0) {
                            ?>
                            <tr>
                                <td colspan="6"><p>Não há documentos de parcerias para mostrar</p></td>
                            </tr>
                            <?php
                        } else {
                            while ($listagem = $sql_exec->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $listagem['id'] ?></td>
                                    <td><?php echo $listagem['titulo_documento'] ?></td>
                                    <td><?php $listagem['descricao'] ?></td>
                                    <td><?php echo $listagem['data_submissao'] ?></td>
                                    <td><?php echo $listagem['path'] ?></td>

                                    <?php
                                    if ($usuario['privilegio'] == 1) {
                                        ?>
                                        <td>
                                            <div class="botoes-comandos">
                                                <a href="documentos_alterar.php?id=<?php echo $listagem['id'] ?>"><button class="alterar">Alterar</button></a>
                                                <a href="documentos_excluir.php?id=<?php echo $listagem['id'] ?>"><button class="cuidado">Excluir</button></a>
                                            </div>
                                        </td>
        <?php } ?>
                                </tr>

                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div> 
        </div>


    </body>

</html>
