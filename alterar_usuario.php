<?php
include('lib/conexao.php');

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    die('<p class="error">Erro ao logar, volte a página de <a href="login.php">login</a> para iniciar uma sessão</p>');
}
$id = intval($_GET['id']);
$sql_code = "SELECT * FROM administrador WHERE id='$id'";
$sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
$usuario = $sql_exec->fetch_assoc(); //não faz loop porque é só um usuário
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Alterar Usuário</title>
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
                    <li><a href="transparencia/parcerias_listagem.php">Parcerias</a></li>
                    <li><a href="transparencia/administracao_listagem.php">Administração</a></li>
                    <li><a href="transparencia/contabilidade_listagem.php">Contabilidade</a></li>
                    <li><a href="transparencia/documentos_listagem.php" >Documentos</a></li>
                    <li><a href="transparencia/planoacao_listagem.php">Plano de Ação</a></li>
                    <li><a href="transparencia/regularidadefiscal_listagem.php">Regularidade Fiscal</a></li>
                    <li><a href="transparencia/relatoriosatividade_listagem.php">Relatórios</a></li>
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
                <h2>Alterar Dados do Usuários</h2>
                <p>Preencha as credenciais abaixo para alterar os dados de um usuário no sistema da ABCD.</p>
            </div>
            <form action="" method="POST">
                <div class="secao-column">
                    <div>

                        <label>Nome:</label>
                        <input type="text" name="nome" id="nome" value="<?php echo$usuario['nome']; ?>" autofocus>
                        <label>E-mail:</label>
                        <input type="text" name="email" id="email" value="<?php echo$usuario['email']; ?>" autofocus>
                    </div>
                </div>
                <div class="secao-row">
                    <div>
                        <label>Privilégio:</label>
                        <input type="radio" name="priv"  id="priv_sim" value="1"  <?php if ($usuario['privilegio'] == '1'): ?>checked='checked'<?php endif; ?>><label for="priv_sim">Sim</label>
                        <input type="radio" name="priv"  id="priv_nao" value="0"  <?php if ($usuario['privilegio'] == '0'):  ?>checked='checked'<?php endif; ?>><label for="priv_nao">Não</label>
                    </div>
                </div>
                <div class="botoes">
                    <button type="reset" name="limpar" id="limpar">Limpar</button>
                    <button type="submit" name="enviar" id="enviar">Alterar</button>
                </div>   
            </form>
                        </div>
                      
                    <?php
                    $erro = false;

                    if (count($_POST) > 0) {
                        if (isset($_POST['enviar'])) {
                            $nome = $_POST['nome'];
                           $email=  $_POST['email'];
                           $privilegio=$_POST['priv'];

                           
                /* VERIFICANDO SE OS CAMMPOS ESTÃO VAZIOS */
                if (empty($nome)) {
                    $erro = "O campo nome não pode estar vazio!";
                }
                if (empty($email)) {
                    $erro = "O campo email não pode estar vazio!";
                }
               

                /* VERIFICANDO O LIMITE DE CARACTERES DOS CAMPOS */
      /*          if (!empty($nome) && strlen($nome) < 10 || strlen($nome) > 50) {
                    $erro = "O campo nome deve ter entre 10 e 50 caracteres";
                }*/
              /*  if (empty($email) && strlen($email) < 10 || strlen($email) > 50) {
                    $erro = "O campo e-mail deve ter entre 10 e 50 caracteres";
                }*/
              

                /* VERIFICANDO A FORMATAÇÃO DOS CAMPOS */
                if (empty($email)) {
                    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                    if (!$email) {
                        $erro = 'Preencha o campo no formato example@gmail.com';
                    }
                }
                
                                if ($erro) {
                                    echo '<p style="color:red">' . $erro . '</p>';
                                } else {
                                    $sql_code = "UPDATE administrador SET nome='$nome',email='$email', privilegio='$privilegio' WHERE id='$id'";
                                    $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
                                    if ($deu_certo) {
                                        echo '<p class="certo">Atualização realizada com sucesso, <a href="listagem_usuario.php">voltar</a> para página de listagem de usuários</p>';
                                        unset($_POST);
                                        die();
                                    } else {
                                        echo '<p class="error">Erro ao realizar atualização nos dados</p>';
                                    }
                                }
                            } 
                        }
                    
                    ?>
                    </body>
                    </html>