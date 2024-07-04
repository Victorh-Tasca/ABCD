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
        <title>Submeter Arquivo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style2.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="javascript/script.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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

                <div class=formulario>
                    <div class="descricao">
                        <h2>Submeter arquivos</h2>
                        <p>Preencha os campos abaixo para submeter um arquivo no sistema da ABCD.</p>
                    </div>
                    <form action="" method="POST">
                        <div class="secao-column">
                            <!--<label>Senha antiga:</label>-->
                            <input type="hidden" name="senha" class="auto_modal" value="<?php echo $usuario['senha']; ?>">
                            <label>Confirmar senha antiga:</label>
                            <input type="password" class="auto_modal" name="senha_antiga">
                            <label>Nova Senha:</label>
                            <input type="password" class="auto_modal" name="nova_senha">
                        </div>
                        <div class="botoes">
                            <button type="submit" name="submeter" id="enviar">Enviar</button>
                        </div>   
                    </form>
                    <?php
                    $erro = false;

                    if (count($_POST) > 0) {
                        if (isset($_POST['submeter'])) {
                            $senha = $usuario['senha'];
                            $senha_antiga = $_POST['senha_antiga'];
                            if (password_verify($senha_antiga, $senha)) {

                                $nova_senha = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT);
                                if (!empty($nova_senha) && strlen($nova_senha) < 10 || strlen($nova_senha) > 100) {
                                    $erro = 'O campo senha deve ter no mínimo 10 caracteres e no máximo 100 caracteres';
                                }
                                if ($erro) {
                                    echo '<p style="color:red">' . $erro . '</p>';
                                } else {
                                    $sql_code = "UPDATE administrador SET senha='$nova_senha' WHERE id='$id'";
                                    $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
                                    if ($deu_certo) {
                                        echo '<p class="certo">Atualização realizada com sucesso, <a href="meus_dados.php">voltar</a> para página de dados de usuário</p>';
                                        unset($_POST);
                                        die();
                                    } else {
                                        echo '<p class="error">Erro ao realizar atualização</p>';
                                    }
                                }
                            } else {
                                echo "As senhas não são compatíveis";
                            }
                        }
                    }
                    ?>
                </div>   
            </div>   
        </div>   


    </body>
</html>