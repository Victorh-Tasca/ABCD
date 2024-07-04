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
                   <li><a href="submeter_arquivo.php">Meus dados</a></li>
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
            <div class="submeter-arquivos">
                <div class="titulo-submeter">
                    <p>Associação Beneficente Caminho de Damasco</p>
                </div>
                <div class="formulario-arquivos">
                    <div class=formulário>
                        <div class="descricao">
                            <h2>Submeter Arquivo</h2>
                            <p>Preencha os campos abaixo para submeter um arquivo no sistema da ABCD.</p>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="secao-column">
                                <div>
                                    <label>Título do Arquivo:</label>
                                    <input type="text" name="nome" id="nome" autofocus>
                                    <label>Descrição:</label>
                                    <textarea name="descricao" id="descricao" cols="30" rows="10"></textarea>
                                    <label>Categoria do Arquivo:</label>
                                    <a href="cadastro_categoria.php">CADASTRAR CATEGORIA</a>
                                    <select name="categoria">
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
                                    </select>
                                    <label>Arquivo:</label>
                                    <input type="file" name="arquivo" autofocus>
                                </div>
                            </div>
                            <div class="botoes">
                                <button type="reset" name="limpar" id="limpar">Limpar</button>
                                <button type="submit" name="submeter" id="enviar">Submeter</button>
                            </div>   
                        </form>
                    </div>
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
                $categoria = $_POST['categoria'];
                $path = "";
                if (isset($_FILES['arquivo'])) {
                    $arquivo = $_FILES['arquivo'];
                    $path = enviar($arquivo['error'], $arquivo['size'], $arquivo['name'], $arquivo['tmp_name']);
                    if ($path == false) {
                        $erro = "Falha ao enviar arquivo";
                    }
                }
                /* Verificando se os campos estão vazios */
                if (empty($nome)) {
                    $erro = "O campo título não pode ficar em branco";
                }
                if (empty($arquivo)) {
                    $erro = "O campo arquivo não pode ficar em branco";
                }
                /* Verificando o tamando dos caracteres */
                if (!empty($nome) && strlen($nome) < 3 || strlen($nome) > 50) {
                    $erro = 'O campo nome deve ter no mínimo 3 caracteres e no máximo 50 caracteres';
                }
                if (!empty($descricao) && strlen($descricao) < 3 || strlen($descricao) > 200) {
                    $erro = 'O campo nome deve ter no mínimo 20 caracteres e no máximo 200 caracteres';
                }
                if ($erro) {
                    echo '<p class="error">' . $erro . '</p>';
                } else {
                    $sql_code = "INSERT INTO arquivo (titulo_documento,data_submissao,path,descricao,id_categoria) VALUES ('$nome',NOW(),'$path','$descricao','$categoria')";
                    $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
                    if ($deu_certo) {
                        echo '<p>Arquivo submetido com sucesso</p>';
                        /* enviarEmail($email, "Sua conta foi criada com sucesso", "<h1>É um prazer te receber aqui</h1> <p>E-mail:$email</p> <p>Senha:$senha_descriptografada</p>"); */
                        unset($_POST);
                    } else {
                        echo '<p>Erro ao submeter o arquivo</p>';
                    }
                }
            }
        }
        ?>

    </body>

</html>