<!DOCTYPE html>
<html>

    <head>
        <title>Página Inicial</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet" type="text/css" />
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
                            <a href="" onmouseover="funcao_dropdown_submenu()" onmouseout="funcao_dropdown_submenu()" href="#">Parcerias</a>
                            <div id="dropDown_submenu" onmouseover="funcao_dropdown_submenu()" onmouseout="funcao_dropdown_submenu()" class="dropdown-menu-inicial-normal">
                                <a href="#">2021</a>
                                <a href="#">2022</a>
                                <a href="#">2023</a>
                            </div>
                            <a href="Transparencia/Administracao.php">Administração</a>
                            <a href="#">Contabilidade</a>
                            <a href="#">Documentos</a>
                            <a href="#">Plano de Ação</a>
                            <a href="#">Regularidade Fiscal</a>
                            <a href="#">Relatórios</a>
                        </div>
                    </li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </nav>
        </header>

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
                    <div>
                        <label>Privilégio:</label>
                        <input type="radio" name="priv"  id="priv_sim" value="1"  <?php if (isset($_POST['priv']) && $_POST['priv'] == 'sim'): ?>checked='checked'<?php endif; ?>><label for="priv_sim">Sim</label>
                        <input type="radio" name="priv" checked id="priv_nao" value="0"  <?php if (isset($_POST['priv']) && $_POST['priv'] == 'nao'): ?>checked='checked'<?php endif; ?>><label for="priv_nao">Não</label>
                    </div>
                </div>
                <div class="botoes">
                    <button type="submit" name="enviar" id="enviar">Enviar</button>
                </div>   
            </form>
              <?php
        include('lib/conexao.php');

        $erro = false;
        if ($_POST > 0) {
            if (isset($_POST['enviar'])) {
                $nome =$_POST['nome'];
                $email =$_POST['email'];
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