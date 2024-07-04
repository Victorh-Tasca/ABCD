

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
        <div class="radiusbox">
            <div class="textoradius">
                <h1 style="text-align: left;">PORTAL DA TRANSPARÊNCIA</h1>
                <blockquote>
                    <p>
                        <span style="font-size: 20px; text-align: justify;">
                            Acesse publicações periódicas, documentos e demais prestações de contas.
                        </span>
                        <br><span style="font-size: 15px; text-align: justify;"></span>
                        <br>
                    </p></blockquote><p style="text-align: justify;">
                    Como organização social, ABCD - Votuporanga tem o dever de prestar contas a todos os órgãos 
                    fiscalizadores da gestão pública. Para realizar a abertura do documento, basta
                    dar um clique sobre o item almejado.<p>
            </div>
        </div>
        <h1 class="titulo">Regularidade Fiscal</h1>

        <div class="espacotransp sombratransp">

            <h2 class="subtitulo">Documentos - Regularidade Fiscal</h2>
            <hr align="left">
                <?php
                include ("lib/conexao.php");
                $sql_code = "SELECT * FROM arquivo WHERE  id_categoria= 6 ";
                $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
                $sql_listagem = $sql_exec->num_rows;
               
                ?>
                <table>
                    <thead>
                    </thead>
                    <tbody>
                        <?php
                        if ($sql_listagem == 0) {
                            ?>
                            <tr>
                                <td colspan="4"><p>Não há arquivos para mostrar</p></td>
                            </tr>
                            <?php
                        } else {
                            while ($listagem = $sql_exec->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td> <a href="<?php echo $listagem['path'];?>" type="application/pdf" width="100%" height="100%" target="_blank"><?php  echo $listagem['titulo_documento'] ?></a></td>
                                </tr>
                    </tbody>
                              <?php 
                            }
                        }?>
            </table>
        </div>

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