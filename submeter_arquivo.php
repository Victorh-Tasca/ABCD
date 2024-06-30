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
                <section class="formulario">
                    <div class="descricao">
                        <h2>Submeter Arquivo</h2>
                        <p>Preencha os campos abaixo para submeter um arquivo no sistema da ABCD.</p>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="secao-column">
                            <label>Título do Arquivo:</label>
                            <input type="text" name="nome" id="nome" class="auto_modal" autofocus>
                            <label>Descrição:</label>
                            <textarea name="descricao" class="auto_modal" id="descricao" cols="30" rows="10" ></textarea>
                            <label>Categoria do Arquivo:</label>
                            <select name="categoria" class="auto_modal">
                                <option value="">Selecione uma categoria</option>
                                <?php
                                $sql_code_categoria = "SELECT * FROM categoria ORDER BY nome ASC";
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
                            <label>Arquivo:</label>
                            <div class='input-wrapper'>
                                <label class="labelfile" class="auto_modal" for='input-file'>
                                    Selecionar um arquivo
                                </label>
                                <input id='input-file' name="arquivo" type='file' />
                                <span id='file-name'></span>
                            </div>
                            <script>
                                var inputFile = document.getElementById('input-file');
                                var fileName = document.getElementById('file-name');

                                inputFile.addEventListener('change', function () {

                                    var filePath = this.value;
                                    var fileNameText = filePath.split(
                                            '\\').pop();
                                    fileName.textContent = fileNameText;
                                });
                            </script>                           
                                                                                 <!--<input type="file" name="arquivo" class="auto_modal" autofocus>-->
                        </div>
                        <div class="botoes">
                            <button type="submit" name="submeter" id="enviar">Submeter</button>
                        </div>  
                        <?php
                        include('lib/upload.php');
                        $erro = "";
                        if (isset($_POST['submeter'])) {
                            $nome = $_POST['nome'];
                            $descricao = $_POST['descricao'];
                            $categoria = $_POST['categoria'];
                            $path = "";

                            if (isset($_FILES['arquivo'])) {
                                $arquivo = $_FILES['arquivo'];
                                $path = enviar($arquivo['error'], $arquivo['size'], $arquivo['name'], $arquivo['tmp_name']);
                                if ($path == false) {
                                    $erro = "Falha ao enviar o arquivo";
                                }
                            }

                            if (empty($nome)) {
                                $erro = "O campo título não pode ficar em branco";
                            }

                            if (empty($path)) {
                                $erro = "O campo arquivo não pode ficar em branco";
                            }

                            if (!empty($nome) && (strlen($nome) < 10 || strlen($nome) > 50)) {
                                $erro = 'O campo nome deve ter no mínimo 10 caracteres e no máximo 50 caracteres';
                            }

                            if (!empty($descricao) && (strlen($descricao) < 20 || strlen($descricao) > 200)) {
                                $erro = 'O campo descrição deve ter no mínimo 20 caracteres e no máximo 200 caracteres';
                            }

                            if ($erro) {
                                echo '<p class="error">' . $erro . '</p>';
                            } else {
                                $sql_code = "INSERT INTO arquivo (titulo_documento, data_submissao, path, descricao, id_categoria) VALUES ('$nome', NOW(), '$path', '$descricao', '$categoria')";
                                $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
                                if ($deu_certo) {
                                    echo '<p>Arquivo submetido com sucesso</p>';
                                    unset($_POST);
                                } else {
                                    echo '<p>Erro ao submeter o arquivo</p>';
                                }
                            }
                        }
                        ?>
                    </form>
                </section>
            </div>
        </div>


    </body>

</html>