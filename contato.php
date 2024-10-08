<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
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
                    <p><a href="mailto:caminho_de_damasco@hotmail.com">caminho_de_damasco@hotmail.com</a></p>
                    <p><a href="tel:+551734225685">(17) 3422-5685</a></p>
                    <p><a href="https://www.facebook.com/caminhode.damasco/?locale=pt_BR" target="_blank"><img
                                src="img/facebook.png"></a></p>
                    <p><a href="https://www.instagram.com/abcdvotu/" target="_blank"><img src="img/instagram.png"></a></p>
                    <p><a href="https://www.youtube.com/@caminhodedamasco522" target="_blank"><img src="img/youtube3.png"></a></p>
                </div>
            </div>
        </div>
        <header class="menu-inicial">
            <img src="img/ABCD.png" alt="" />
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
                            <div id="dropDown_submenu" onmouseover="funcao_dropdown_submenu()" onmouseout="funcao_dropdown_submenu()" class="dropdown-menu-inicial">
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
        <section class="formulario">
            <div id="descricao_form">
                <h2>Formulário de contato</h2>
                <p>Preencha o formulário abaixo e entraremos em contato com você!</p>
            </div>
            <form action="" method="POST">
                <div class="secao-column">
                        <label>Nome:</label>
                        <input type="text" name="nome" class="auto_modal" autofocus>
                        <label>Telefone:</label>
                        <input type="tel" name="telefone" class="auto_modal" autofocus>
                        <label>Email:</label>
                        <input type="email" name="email" class="auto_modal" autofocus>
                        <label>Mensagem:</label>
                        <textarea name="mensagem" class="auto_modal" cols="30" rows="10"></textarea>
                </div>
                <div class="botoes">
                    <button type="submit" name="enviar" id="enviar">Enviar</button>
                </div>   
            </form>
            <?php
            include("lib/conexao.php");
            $erro = false;
              function limpar_texto($str) {
            return preg_replace("/[^0-9]/", "", $str);
        }
            if (count($_POST) > 0) {
                if (isset($_POST['enviar'])) {
                    $nome = $_POST['nome'];
                    $telefone = $_POST['telefone'];
                    $email = $_POST['email'];
                    $mensagem=$_POST['mensagem'];
                    /*VERIFICANDO SE OS CAMPOS ESTÃO VAZIOS*/
                    if(empty($nome)){
                        $error="O campo nome não pode ficar em branco";
                    }
                     if(empty($telefone)){
                        $error="O campo telefone não pode ficar em branco";
                    }
                     if(empty($email)){
                        $error="O campo email não pode ficar em branco";
                    }
                     if(empty($mensagem)){
                        $error="O campo mensagem não pode ficar em branco";
                    }
                    /*VERIFICANDO QTD DE CARACTERES*/
                    if(!empty($nome) && strlen($nome) < 10 || strlen($nome) > 200){
                        $erro="O campo nome deve ter no mínimo 10 caracteres e no máximo 50 caracteres";
                    }
                     if(!empty($mensagem) && strlen($mensagem) < 10 || strlen($mensagem) > 200){
                        $erro="O campo mensagem deve ter no mínimo 10 caracteres e no máximo 200 caracteres";
                    }
                    if (!empty($telefone)) {
                    $telefone = limpar_texto($telefone);
                    if (strlen($telefone) != 11) {
                        $erro = "Preencha o campo telefone secundário no fomato (XX) XXXXX-XXXX";
                    }
                }
                  if (!empty($email)) {
                    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                    if (!$email) {
                        $erro = "Preencha o campo e-mail no fomato: exemplo@gmail.com";
                    }
                }
                
                 if ($erro) {
                    echo '<p class="error">' . $erro . '</p>';
                } else {
                    $sql_code = "INSERT INTO contato (nome,telefone,email,mensagem,data_contato)VALUES ('$nome','$telefone','$email','$mensagem',NOW())";
                    $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
                    if ($deu_certo) {
                        echo '<p class="certo">Seu contato realizado com sucesso, <a href="index.php">voltar para página inicial</a></p>';
                    } else {
                        echo '<p class="error"> Erro ao realizar o contato</p>';
                    }
                }
                }
            }
            ?>
        </section>
        <footer>
            <img class="footimg" src="img/Copia_de_ABCD_-_LOGO.png" alt=""/>
            <div class="row footrow" >
                <img class="footgps" src="img/icons8-gps-48.png" alt=""/>
                <p>R. Benedito Pereira, 1874 - Votuporanga, 15501-351</p>
            </div>
            <div class="row footrow">
                <img class="footphone" src="img/icons8-phone-96.png" alt=""/>
                <p>(17) 3422-5685</p>
            </div>
            <div class="row footrow">
                <img class="footemail" src="img/icons8-email-50.png" alt=""/>
                <p>caminho_de_damasco@hotmail.com</p>  
            </div>
        </footer>
    </body>
</html>