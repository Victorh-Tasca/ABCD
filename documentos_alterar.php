<?php
include('lib/conexao.php');

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    die('<p class="error">Erro ao logar, volte a página de <a href="login.php">login</a> para iniciar uma sessão</p>');
}
$id = intval($_GET['id']);
$sql_code = "SELECT * FROM arquivo WHERE id='$id'";
$sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
$doc = $sql_exec->fetch_assoc(); //não faz loop porque é só um usuário

$iduser = $_SESSION['usuario'];
$sql_codeuser = "SELECT * FROM administrador WHERE id='$iduser'";
$sql_execuser = $mysqli->query($sql_codeuser) or die($mysqli->error);
$usuario = $sql_execuser->fetch_assoc(); //não faz loop porque é só um usuário
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Alterar Dados dos Arquivo</title>
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
                        <h2>Alterar Dados do Arquivo</h2>
                        <p>Preencha os campos abaixo para alterar os dados de um arquivo no sistema da ABCD.</p>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="secao-column">
                                <label>Título do Arquivo:</label>
                                <input type="text" name="nome" id="nome" class="auto_modal" autofocus value="<?php echo $doc['titulo_documento'] ?>">
                                <label>Descrição:</label> 
                                <textarea name="descricao" id="descricao" class="auto_modal" cols="30" rows="10" ><?php echo $doc['descricao'] ?></textarea>
                                <label>Categoria do Arquivo:</label>
                                <select name="categoria" class="auto_modal" >
                                    <?php
                                    $sql_code_procurar = "SELECT nome FROM categoria AS C JOIN arquivo AS A ON A.id_categoria=C.id WHERE A.id='$id'";
                                    $sql_query_procurar = $mysqli->query($sql_code_procurar) or die($mysqli->error);
                                    $procurar_categoria = $sql_query_procurar->fetch_assoc();
                                    ?>
                                    <option value="<?php echo $doc['id_categoria'] ?>"> <?php echo $procurar_categoria['nome'] ?></option>
                                    <?php
                                    $sql_code_categoria = "SELECT * FROM categoria  WHERE id <> 4 ORDER BY nome ASC";
                                    $sql_query_categoria = $mysqli->query($sql_code_categoria) or die($mysqli->error);
                                    while ($categoria = $sql_query_categoria->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $categoria['id'] ?>">
                                            <?php echo $categoria['nome']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <?php
                                if ($doc['path']) {
                                    ?>
                                    <label>Arquivo:</label>
                                    <p><?php echo $doc['path'] ?></p>
                                    <input type="hidden" name="arquivo_antigo" value="<?php echo $doc['path'] ?>">
                                <?php } ?>
                                <input type="file" name="arquivo" autofocus>
                        </div>
                        <div class="botoes">
                            <button type="submit" name="submeter" id="alterar">Alterar</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>

        <?php
        include('lib/conexao.php');
        include('lib/upload.php');
        $erro = false;

        if (count($_POST) > 0) {
            if (isset($_POST['submeter'])) {
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $categoria_doc = $_POST['categoria'];
                $path = "";

                if (isset($_FILES['arquivo'])) {
                    $arquivo = $_FILES['arquivo'];
                    $path = enviar($arquivo['error'], $arquivo['size'], $arquivo['name'], $arquivo['tmp_name']);
                    if ($path == false) {
                        $erro = "Falha ao enviar o arquivo";
                    }
                    if (!empty($_POST['arquivo_antigo'])) {
                        unlink($_POST['arquivo_antigo']);
                    }
                }

                if (empty($nome)) {
                    $erro = "O campo título não pode ficar em branco";
                }

                if ($erro) {
                    echo '<p class="error">' . $erro . '</p>';
                } else {

                    $sql_code = "UPDATE arquivo SET titulo_documento='$nome',path='$path',descricao='$descricao',id_categoria='$categoria_doc' WHERE id='$id' ";
                    $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
                    if ($deu_certo) {
                        echo '<p>Arquivo atualizado com sucesso</p>, <a href="documentos_listagem.php">voltar</a> para página de listagem</p>';
                        /* enviarEmail($email, "Sua conta foi criada com sucesso", "<h1>É um prazer te receber aqui</h1> <p>E-mail:$email</p> <p>Senha:$senha_descriptografada</p>"); */
                        unset($_POST);
                        die();
                    } else {
                        echo '<p>Erro ao atualizar o arquivo</p>';
                    }
                }
            }
        }
        ?>
    </body>
</html>
