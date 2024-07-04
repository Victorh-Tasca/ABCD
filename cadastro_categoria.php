<!DOCTYPE html>
<html>

    <head>
        <title>Cadastrar Categoria</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style2.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="javascript/script.js"></script>
    </head>

    <body>

        <div class="menu-lateral">
            <div class="imagem-menu-lateral">
                <img src="img/logo_adm.png" alt=""/>
            </div>
            <div class="links-menu-lateral">
                <ul>
                      <li><a href="submeter_arquivo.php">Início</a></li>

                    <li><a href="parcerias_listagem.php">Parcerias</a></li>
                    <li><a href="administracao_listagem.php">Administração</a></li>
                    <li><a href="contabilidade_listagem.php">Contabilidade</a></li>
                    <li><a href="documentos_listagem.php">Documentos</a></li>
                    <li><a href="planoacao_listagem.php">Plano de Ação</a></li>
                    <li><a href="regularidadefiscal_listagem.php" >Regularidade Fiscal</a></li>
                    <li><a href="relatoriosatividade_listagem.php" >Relatórios</a></li>
                    <li><a href="listagem_contato.php">Contato</a></li>
                    <li><a href="listagem_usuario.php">Usuários</a></li>
                </ul>
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
                        <h2>Cadastrar Categoria</h2>
                        <p>Preencha os campos abaixo para cadastrar uma categoria de arquivo no sistema da ABCD.</p>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="secao-column">
                            <div>
                                <label>Nome da categoria:</label>
                                <input type="text" name="nome" id="nome" autofocus>
                                <label>Descrição:</label>
                                <textarea name="descricao" id="descricao" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="botoes">
                            <button type="reset" name="limpar" id="limpar">Limpar</button>
                            <button type="submit" name="enviar" id="enviar">Enviar</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
        include('lib/conexao.php');
        $erro=false;
         if (count($_POST) > 0) {
            if (isset($_POST['enviar'])) {
                $nome = $_POST['nome'];
                $descricao=$_POST['descricao'];
                
                    /*Verificando se os campos estão vazios*/
                    if(empty($nome)){
                        $erro="O campo título não pode ficar em branco";
                    }
                   
                if($erro){
                    echo '<p class="error">'.$erro.'</p>';
                }
                else {
                $sql_code = "INSERT INTO categoria (nome,descricao) VALUES ('$nome','$descricao')";
                $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
                if ($deu_certo) {
                    echo '<p>Categoria cadastrada com sucesso</p>';
                    /* enviarEmail($email, "Sua conta foi criada com sucesso", "<h1>É um prazer te receber aqui</h1> <p>E-mail:$email</p> <p>Senha:$senha_descriptografada</p>"); */
                    unset($_POST);
                } else {
                    echo '<p>Erro ao cadastrar a categoria</p>';
                }
            }
            }
         }

?>

    </body>

</html>