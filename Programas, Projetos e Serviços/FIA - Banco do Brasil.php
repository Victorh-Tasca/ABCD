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
  <link href="../css/style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../javascript/script.js"></script>
</head>

<body>
  <div class="sub-header">
    <div class="canais">
      <div>
        <p><a href="mailto:caminho_de_damasco@hotmail.com">caminho_de_damasco@hotmail.com</a></p>
        <p><a href="tel:+551734225685">(17) 3422-5685</a></p>
        <p><a href="https://www.facebook.com/caminhode.damasco/?locale=pt_BR" target="_blank"><img
              src="../img/facebook.png"></a></p>
        <p><a href="https://www.instagram.com/abcdvotu/" target="_blank"><img src="../img/instagram.png"></a></p>
        <p><a href="https://www.youtube.com/@caminhodedamasco522" target="_blank"><img src="../img/youtube3.png"></a></p>
      </div>
    </div>
  </div>
  <header class="menu-inicial">
    <img src="../img/ABCD.png" alt="" />
    <nav>
      <ul class="menu-inicial">
        <li>
          <a href="../index.php">Início</a>

        </li>

        <li><a href="../historia.php">História</a>
        </li>
        <li>
          <a href="" onmouseover="funcao_dropdown()" onmouseout="funcao_dropdown()">Programas, Projetos e Serviços</a>
          <div id="dropDown" onmouseover="funcao_dropdown()" onmouseout="funcao_dropdown()" class="dropdown-menu-inicial">
            <a href="FIA - Banco do Brasil.php">FIA - Banco do Brasil</a>
            <a href="FMDCA.php">FMDCA</a>
            <a href="SERVIÇO DE CONVIVÊNCIA E FORTALECIMENTO DE VINCULOS.php">Serviço de Convivência e Fortalecimento de Vínculos</a>
          </div>
        </li>
        <li>
          <a href="" onmouseover="funcao_dropdown2()" onmouseout="funcao_dropdown2()">Transparência</a>
          <div id="dropDown2" onmouseover="funcao_dropdown2()" onmouseout="funcao_dropdown2()" class="dropdown-menu-inicial">
            <a href="#">Administração</a>
            <a href="#">Contabilidade</a>
            <a href="#">Documentos</a>
            <a href="#">Plano de Ação</a>
            <a href="#">Regularidade Fiscal</a>
            <a href="#">Relatórios</a>
          </div>
        </li>
        <li><a href="../contato.php">Contato</a></li>
      </ul>
    </nav>
  </header>



        <footer>
            <img class="footimg" src="../img/Copia_de_ABCD_-_LOGO.png" alt=""/>
            <div class="row footrow" >
                <img class="footgps" src="../img/icons8-gps-48.png" alt=""/>
                <p>R. Benedito Pereira, 1874 - Votuporanga, 15501-351</p>
            </div>
            <div class="row footrow">
                <img class="footphone" src="../img/icons8-phone-96.png" alt=""/>
                <p>(17) 3422-5685</p>
            </div>
            <div class="row footrow">
                <img class="footemail" src="../img/icons8-email-50.png" alt=""/>
                <p>caminho_de_damasco@hotmail.com</p>  
            </div>

        </footer>
    </body>
</html>