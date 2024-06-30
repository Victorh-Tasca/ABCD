<?php
require ("lib/conexao.php");
if (isset($_POST['entrar'])) {
    $email = $mysqli->escape_string($_POST['email']); //proteção contra sql injection
    $senha = $_POST['senha'];
    $sql_code = "SELECT * FROM administrador WHERE email='$email' LIMIT 1";
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
    if ($sql_exec->num_rows == 0) {
        echo '<p class="error">E-mail incorreto</p>';
    } else {
        $usuario = $sql_exec->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            echo '<p class="sucesso">Usuário logado com sucesso,</p>';
            if (!isset($_SESSION)) {
                session_start();

                $_SESSION['usuario'] = $usuario['id'];

                header("Location:submeter_arquivo.php");
            }
        } else {
            echo '<p class="error">Senha incorreta</p>';
        }
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Página Inicial</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="javascript/script.js"></script>
    </head>

    <body>
        <div class="sub-header">
            <div class="canais">
                <div>
                    <p class="canal-text"><a href="mailto:caminho_de_damasco@hotmail.com">caminho_de_damasco@hotmail.com</a></p>
                    <p class="canal-text"><a href="tel:+551734225685">(17) 3422-5685</a></p>
                    <p><a href="https://www.facebook.com/caminhode.damasco/?locale=pt_BR" target="_blank"><img
                                src="img/facebook.png"></a></p>
                    <p><a href="https://www.instagram.com/abcdvotu/" target="_blank"><img src="img/instagram.png"></a></p>
                    <p><a href="https://www.youtube.com/@caminhodedamasco522" target="_blank"><img src="img/youtube3.png"></a></p>
                </div>
            </div>
        </div>
        <header class="menu-inicial">
            <img src="img/logo_inicio.png" alt=""/>
            <nav>
                <ul class="menu-inicial">
                    <li>
                        <a href="index.php">Início</a>

                    </li>

                    <li>
                        <a href="#"  onmouseover="funcao_dropdown()" onmouseout="funcao_dropdown()">História</a>
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
                            <a href="transparencia/parcerias.php">Parcerias</a>
                            <a href="transparencia/administracao.php">Administração</a>
                            <a href="transparencia/contabilidade.php">Contabilidade</a>
                            <a href="transparencia/documentos.php">Documentos</a>
                            <a href="transparencia/plano_acao.php">Plano de Ação</a>
                            <a href="transparencia/regularidade_fiscal.php">Regularidade Fiscal</a>
                            <a href="transparencia/relatorios.php">Relatórios</a>
                        </div>
                    </li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </nav>
        </header>

        <section class="formulario">
            <div class="descricao">
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
                    <p> Precisa cadastrar um colaborador? <a href="cadastro_usuario.php">Clique aqui!</a></p>

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