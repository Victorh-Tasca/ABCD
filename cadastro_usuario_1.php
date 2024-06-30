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
                <section class=formulario>
                    <div class="descricao">
                        <h2>Cadastro</h2>
                        <p>Preencha as credenciais abaixo para cadastrar um novo usuário no sistema da ABCD.</p>
                    </div>
                    <form action="" method="POST">
                        <div class="secao-column">
                            <label>Nome:</label>
                            <input type="text" name="nome" id="nome" class="auto_modal" value="<?php if (isset($_POST['nome'])) echo$_POST['nome']; ?>" autofocus>
                            <label>E-mail:</label>
                            <input type="text" name="email" id="email" class="auto_modal" value="<?php if (isset($_POST['email'])) echo$_POST['email']; ?>" autofocus>
                            <label>Senha:</label>
                            <input type="password" name="senha" id="senha" class="auto_modal" autofocus>
                        </div>
                        <div class="secao-row">
                            <div id="radio">
                                <label>Privilégio:</label>
                                <div class="radio-group">
                                    <input type="radio" name="priv" id="priv_sim" value="1" <?php if (isset($_POST['priv']) && $_POST['priv'] == 'sim'): ?>checked='checked'<?php endif; ?>>
                                    <label for="priv_sim">Sim</label>
                                    <input type="radio" name="priv" checked id="priv_nao" value="0" <?php if (isset($_POST['priv']) && $_POST['priv'] == 'nao'): ?>checked='checked'<?php endif; ?>>
                                    <label for="priv_nao">Não</label>
                                </div>
                            </div> 
                        </div>
                        <div class="botoes">
                            <button type="submit" name="enviar" id="enviar">Cadastrar</button>
                        </div>   
                    </form>
                    <?php
                    include('lib/conexao.php');

                    $erro = false;
                    if ($_POST > 0) {
                        if (isset($_POST['enviar'])) {
                            $nome = $_POST['nome'];
                            $email = $_POST['email'];
                            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                            $privilegio = $_POST['priv'];

                            /* VERIFICANDO SE OS CAMMPOS ESTÃO VAZIOS */
                            if (empty($nome)) {
                                $erro = "O campo nome não pode estar vazio!";
                            }
                            if (empty($email)) {
                                $erro = "O campo email não pode estar vazio!";
                            }
                            if (empty($senha)) {
                                $erro = "O campo senha não pode estar vazio!";
                            }

                            /* VERIFICANDO O LIMITE DE CARACTERES DOS CAMPOS */
                            if (!empty($nome) && strlen($nome) < 10 || strlen($nome) > 50) {
                                $erro = "O campo nome deve ter entre 10 e 50 caracteres";
                            }
                            if (!empty($email) && strlen($email) < 10 || strlen($email) > 50) {
                                $erro = "O campo e-mail deve ter entre 10 e 50 caracteres";
                            }
                            if (!empty($senha) && strlen($senha) < 10 || strlen($senha) > 100) {
                                $erro = 'O campo senha deve ter no mínimo 10 caracteres e no máximo 100 caracteres';
                            }

                            /* VERIFICANDO A FORMATAÇÃO DOS CAMPOS */
                            if (!empty($email)) {
                                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                                if (!$email) {
                                    $erro = 'Preencha o campo no formato example@gmail.com';
                                }
                            }

                            /* FORMATANDO ERRO */
                            if ($erro) {
                                echo '<p class="error">' . $erro . '</p>';
                            } else {
                                $sql_code = "INSERT INTO administrador (nome,email,senha,data_cadastro,privilegio) VALUES ('$nome', '$email', '$senha', NOW(),'$privilegio')";
                                $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
                                if ($deu_certo) {
                                    echo '<p class="certo">Cadastro realizado com sucesso</p>';
                                    unset($_POST);
                                } else {
                                    echo '<p class="error">Erro ao realizar cadastro</p>';
                                }
                            }
                        }
                    }
                    ?>
                </section>
            </div>
        </div>


    </body>

</html>
