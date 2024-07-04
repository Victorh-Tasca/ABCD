<!DOCTYPE html>
<html>
    <head>
        <title>Página Inicial</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="javascript/script.js"></script>
    </head>

    <body>
        <div class="sub-header">
            <div class="canais">
                <div class="canal-text">
                    <a href="mailto:caminho_de_damasco@hotmail.com">caminho_de_damasco@hotmail.com</a>
                </div>
                <div class="canal-text"><a href="tel:+551734225685">(17) 3422-5685</a></div>
                <div class="canal-icon"><a href="mailto:caminho_de_damasco@hotmail.com"><img src="img/email.png"></a></div>
                <div class="canal-icon"><a href="tel:+551734225685"><img src="img/telefone.png"></a></div>
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
            <div class="burguer-div">
                <label class="burger" for="burger">
                    <input type="checkbox" id="burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>
        </header>
        <a href="" class="icon-whatsapp"><img src="img/whatsapp.png"></a>

        <div class="banner-inicio">
            <div class="image-banner">
            </div>
            <div class="texto-banner">
                <h1>Sobre a ABCD</h1>
                <h6>_______</h6>
                <img src="img/institution_1.png" alt="">
                <p class="com-margin">A Associação Beneficente Caminho de Damasco é uma entidade civil que foi fundada em 1942, atuando no município há mais de 70 anos contribuindo para a formação da cidadania e na efetivação dos direitos sociais.</p>
                <br>
                <p>O foco de atuação que a ABCD busca é a valorização da infância e juventude, que vem sendo realizada por intermédio do Serviço de Convivência e Fortalecimento de Vínculos destinado a crianças e adolescentes de 06 a 15 anos.</p>
            </div>
        </div>
        
        <div class="cards">
            <div class="card-1">
                <div class="title-banner">

                    <h2>QUEM</h2>
                    <h3>SOMOS?</h3>
                </div>

                <p>A ABCD-(Associação Beneficente “Caminho de Damasco”), é uma entidade civil, sem fins lucrativos e sem fins econômicos.
                </p>
                <div class="botao-card">
                    <a href="">NOSSA HISTÓRIA</a>
                </div>
            </div>
            <div class="card-2">
                <div class="title-banner">

                    <h2>O QUE</h2>
                    <h3>FAZEMOS?</h3>
                </div>

                <p>A entidade tem como objetivo atender, defender e garantir os direitos de crianças e adolescentes através de ações sociais.</p>
                <div class="botao-card">
                    <a href="">NOSSOS SERVIÇOS</a>
                </div>
            </div>      
            <div class="card-3">
                <div class="title-banner">

                    <h2>COMO</h2>
                    <h3>CONTRIBUIR?</h3>
                </div>
                <p>Para você que acredita em nosso trabalho e deseja apoiá-lo, clique no botão abaixo para ir até nosso formulário de contato. </p>

                <div class="botao-card">
                    <a href="">CONTRIBUA CONOSCO</a>
                </div>
            </div>      
        </div>


        <div class="projetos">
            <h2>Programas, Projetos e Serviços</h2>



            <input type="radio" class="slide-controller" name="slide" checked="">


            <input type="radio" class="slide-controller" name="slide">


            <div class="slide-show">

                <ul class="slides-list">
                    <div class="cards-projetos">

                        <li class="slide">
                            <div class="of_canto">
                               <!-- <img src="img/musica.jpg">-->
                               <h5> Oficina de Canto</h5>
                               <p>Possibilita a ampliação do universo informacional, artístico e cultural das crianças e adolescentes, bem como estimular o desenvolvimento de potencialidades, habilidades, talentos e propiciar sua formação cidadã.</p>
                           </div>
                       </li>
                       <li class="slide">
                        <div class="pro_scfv">
                            <!--<img src="img/scfv.jpg">-->
                            <h5> Serviço de Convivência e o Fortalecimento de Vínculos</h5>
                            <p>Promove o desenvolvimento de ações de convivência e fortalecimento de vínculos, proporcionando melhores condições ao acesso, permanência e sucesso escolar, focando em ações que favoreçam o fortalecimento e o estreitamento dos vínculos familiares.</p>
                        </div>
                    </li>
                    <li class="slide">
                        <div class="of_psico">
                           <!-- <img src="img/psicossocial.jpg">-->
                           <h5>Oficina Psicosocial</h5>
                           <p>Possibilita a imersão de nossas crianças e adolescentes em pautas e abordagens essenciais para seu entendimento como indivíduo na sociedade, gerando debates e reflexões acerca de diversos temas sociais.</p>
                       </div>
                   </li>
                   <li class="slide">
                    <div class="of_rsc">
                        <h5>Oficina Recrear, Socializar e Cooperar</h5>
                        <p>Tem como objetivo desenvolver habilidades para quem participa trabalhando o equilíbrio, agilidade, rapidez, atenção, lealdade, tato, confiança, velocidade, resistência física, coordenação, memória, controle, força, observação, reflexão, além de habilidades de superação em situações difíceis.</p>
                    </div>
                </li>
                <li class="slide">
                    <div class="of_danca">
                        <h5>Oficina de Dança</h5>
                        <p>Com o objetivo de ensinar as crianças e adolescentes a desenvolverem seus corpos e mentes através das expressões corporais e manifestações culturais.</p>
                    </div>
                </li>
                <li class="slide">
                    <div class="ad_cs_ds">
                        <h5>Atividades desenvolvidas, Convivência Social e Direito de Ser.</h5>
                        <p>São atividades que tem como objetivo promover a interação e convivência entre as crianças e adolescentes, incentivando-os a exercitar a empatia, a compaixão e fazendo-os assumir os mais diversos papéis perante inúmeras questões sociais. </p>
                    </div>
                </li>

            </div></ul>
        </div>
    </div>



    <footer>
        <img class="footimg" src="img/Copia_de_ABCD_-_LOGO.png" alt="">
        <div class="row footrow">
            <img class="footgps" src="img/icons8-gps-48.png" alt="">
            <p>R. Benedito Pereira, 1874 - Votuporanga, 15501-351</p>
        </div>
        <div class="row footrow">
            <img class="footphone" src="img/icons8-phone-96.png" alt="">
            <p>(17) 3422-5685</p>
        </div>
        <div class="row footrow">
            <img class="footemail" src="img/icons8-email-50.png" alt="">
            <p>caminho_de_damasco@hotmail.com</p>
        </div>
    </footer>



    </body>

</html>