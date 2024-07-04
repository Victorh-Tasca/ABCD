<?php
include('lib/conexao.php');

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    die('<p class="error">Erro ao logar, volte a página de <a href="login.php">login</a> para iniciar uma sessão</p>');
}
$id = $_SESSION['usuario'];
$sql_code = "SELECT * FROM administrador WHERE id='$id'";
$sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
$usuario = $sql_exec->fetch_assoc(); //não faz loop porque é só um usuário
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Listagem de Usuários</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style2.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="javascript/script.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    </head>

    <body>
        <div id="sidebar" class="menu-lateral sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="imagem-menu-lateral">
                <a href="submeter_arquivo.php">
                    <img src="img/logo_adm.png" alt=""/>
                </a>
            </div>
            <div class="links-menu-lateral">
                <ul>
                    <li><a href="submeter_arquivo.php">Início</a></li>
                    <li><a href="parcerias_listagem.php">Parcerias</a></li>
                    <li><a href="administracao_listagem.php">Administração</a></li>
                    <li><a href="contabilidade_listagem.php">Contabilidade</a></li>
                    <li><a href="documentos_listagem.php">Documentos</a></li>
                    <li><a href="planoacao_listagem.php">Plano de Ação</a></li>
                    <li><a href="regularidadefiscal_listagem.php">Regularidade Fiscal</a></li>
                    <li><a href="relatoriosatividade_listagem.php">Relatórios</a></li>
                    <li><a href="listagem_contato.php">Contato</a></li>
                    <li><a href="listagem_usuario.php">Usuários</a></li>
                    <li><a href="cadastro_usuario_1.php">Cadastrar Usuário</a></li>
                    <li><a href="destruir_sessao.php">Sair</a></li>

                </ul>
            </div>
        </div>
        <button class="openbtn" onclick="openNav()"><i class="fas fa-arrow-right"></i></button>
        <div class="fora-menu">
            <div class="submeter-pos">
                <div class="titulo-pos">
                    <p>Associação Beneficente Caminho de Damasco</p>
                    <div class="user-icon-container">
                        <i class="fas fa-user-circle user-icon" onclick="toggleUserInfo()"></i>
                    </div>
                </div>
                <div class="user-info" id="user-info">
                    <p><label>Nome:</label> <?php echo $usuario['nome'] ?></p>
                    <p><label>E-mail:</label> <?php echo $usuario['email'] ?></p>
                    <p><label>Privilégio:</label> <?php echo $usuario['privilegio'] ?></p>
                    <button onclick="alterarSenha()">Alterar senha</button>
                </div>
                <div class="listagem-arquivos">
                    <h2>Listagem de Cadastros</h2>
                    <h3>Usuários</h3>
                    <?php
                    include ("lib/conexao.php");
                    $sql_code = "SELECT * FROM administrador";
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
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data de Cadasttro</th>
                        <th>Privilégio</th>
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
                                    <td colspan="4"><p>Não há usuários para mostrar</p></td>
                                </tr>
                                <?php
                            } else {
                                while ($listagem = $sql_exec->fetch_assoc()) {
                                    ?>
                                    <tr id="document-<?php echo $listagem['id'] ?>">
                                        <td><?php echo $listagem['id'] ?></td>
                                        <td><?php echo $listagem['nome'] ?></td>
                                        <td><?php echo $listagem['email'] ?></td>
                                        <td><?php echo $listagem['data_cadastro'] ?></td>
                                        <td><?php echo $listagem['privilegio'] ?></td>

                                        <?php
                                        if ($usuario['privilegio'] == 1) {
                                            ?>
                                            <td>
                                                <div class="botoes-comandos">
                                                    <a href="alterar_usuario.php?id=<?php echo $listagem['id'] ?>"><button class="alterar">Alterar</button></a>
                                                    <a><button class="deletar" onclick="deleteDocument(<?php echo $listagem['id'] ?>)">Excluir</button></a>
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
        </div>


    </body>

</html>
