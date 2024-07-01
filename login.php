                <?php
require ("lib/conexao.php");
if (isset($_POST['entrar'])) {
    $email = $mysqli->escape_string($_POST['email']); //proteção contra sql injection
    $senha = $_POST['senha'];
    $sql_code = "SELECT * FROM administrador WHERE email='$email' LIMIT 1";
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
    if ($sql_exec->num_rows == 0) {
      //  echo '<p class="error">E-mail incorreto</p>';
    } else if (!$sql_exec->num_rows == 0) {
        $usuario = $sql_exec->fetch_assoc();
        $validando_senha=password_verify($senha, $usuario['senha']);
        //$senha_hash = password_hash($senha, PASSWORD_BCRYPT, ["cost" => 10]);
        //echo "OLÁ";
       // var_dump($senha);
        //var_dump($usuario['senha']);
        //var_dump($senha_hash);
        //var_dump(password_verify($senha_hash, $usuario['senha']));
        if ($validando_senha) {
            //echo "XAU";
            //echo '<p class="sucesso">Usuário logado com sucesso,</p>';
            if (!isset($_SESSION)) {
                                            session_start();

                $_SESSION['usuario'] = $usuario['id'];

                header("Location:submeter_arquivo.php");
            }
        }
        }if(!password_verify($senha, $usuario['senha'])) {
           // echo '<p class="error">Senha incorreta</p>';
            die;
        }
    
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="javascript/script.js"></script>
    </head>

    <body>
       <div class="sub-header">
            <div class="canais">
                <div class="canal-text">
                    <a href="mailto:caminho_de_damasco@hotmail.com">caminho_de_damasco@hotmail.com</a>
                </div>
                <div class="canal-text"><a href="tel:+551734225685">(17) 3422-5685</a></div>
                <div class="icon"><a href="https://www.facebook.com/caminhode.damasco/?locale=pt_BR" target="_blank"><img src="img/facebook.png"></a></div>
                <div class="icon"><a href="https://www.instagram.com/abcdvotu/" target="_blank"><img src="img/instagram.png"></a></div>
                <div class="icon"><a href="https://www.youtube.com/@caminhodedamasco522" target="_blank"><img src="img/youtube3.png"></a></div>
            </div>
        </div>
         <header class="menu-inicial">
            <img src="img/logo_inicio.png" alt="">
            <nav>
                <ul class="menu-inicial">
                    <li>
                        <a href="index.php">Início</a>

                    </li>

                    <li>
                        <a href="#" onmouseover="funcao_dropdown()" onmouseout="funcao_dropdown()">História</a>
                        <div id="dropDown" onmouseover="funcao_dropdown()" onmouseout="funcao_dropdown()" class="dropdown-menu-inicial">
                            <a href="historia.php">A Entidade</a>
                            <a href="galeria_fotos.php">Galeria</a>
                        </div>
                    </li>

                    <li>
                        <a href="#" onmouseover="funcao_dropdown2()" onmouseout="funcao_dropdown2()">Programas, Projetos e Serviços</a>
                        <div id="dropDown2" onmouseover="funcao_dropdown2()" onmouseout="funcao_dropdown2()" class="dropdown-menu-inicial">
                            <a href="Programas, Projetos e Serviços/FIA - Banco do Brasil.php">FIA - Banco do Brasil</a>
                            <a href="Programas, Projetos e Serviços/FMDCA.php">FMDCA</a>
                            <a href="Programas, Projetos e Serviços/SERVIÇO DE CONVIVÊNCIA E FORTALECIMENTO DE VINCULOS.php">Serviço de Convivência e Fortalecimento de Vínculos</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" onmouseover="funcao_dropdown3()" onmouseout="funcao_dropdown3()">Transparência</a>
                        <div id="dropDown3" onmouseover="funcao_dropdown3()" onmouseout="funcao_dropdown3()" class="dropdown-menu-inicial">
                            <a href="parcerias.php">Parcerias</a>
                            <a href="administracao.php">Administração</a>
                            <a href="contabilidade.php">Contabilidade</a>
                            <a href="documentos.php">Documentos</a>
                            <a href="plano_acao.php">Plano de Ação</a>
                            <a href="regularidade_fiscal.php">Regularidade Fiscal</a>
                            <a href="relatorios.php">Relatórios</a>
                            <a href="login.php">Login</a>


                        </div>
                    </li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </nav>
        </header>

        <section class=formulario>
            <div id="descricao">
                <h2>Login</h2>
                <p>Preencha as credenciais abaixo para logar-se no sistema da ABCD.</p>
            </div>
            <form action="" method="POST">
                <div class="secao-column">
                    <label>E-mail:</label>
                    <input type="text" name="email" class="auto_modal" autofocus>
                    <label>Senha:</label>
                    <input type="password" name="senha" class="auto_modal" autofocus>
                </div>
                <div class="esqueceu-senha">
                    <p><a href="alterar_senha_login.php">Esqueci minha senha</a></p>
                </div>
                <div class="botoes">
                    <button type="submit" name="entrar" id="entrar">Entrar</button>
                </div>   
                <div class="linkcadastro">
                </div>

            </form>
        </section>
        <footer>
            <img class="footimg" src="img/Copia_de_ABCD_-_LOGO.png" alt="" />
            <div class="row footrow">
                <img class="footgps" src="img/icons8-gps-48.png" alt="" />
                <p>R. Benedito Pereira, 1874 - Votuporanga, 15501-351</p>
            </div>
            <div class="row footrow">
                <img class="footphone" src="img/icons8-phone-96.png" alt="" />
                <p>(17) 3422-5685</p>
            </div>
            <div class="row footrow">
                <img class="footemail" src="img/icons8-email-50.png" alt="" />
                <p>caminho_de_damasco@hotmail.com</p>
            </div>

        </footer>

    </body>

</html>