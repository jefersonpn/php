<?php 
    include("../conectar.php");
?>

<!--INICIO CABEÇALHO-->
<?php include('../cabecalho.php'); ?>
<!--FIM CABEÇALHO-->

    <!--FORMULÁRIO DE CADASTRO-->

 <div class="container_cadastro">

        <h3>Realize seu Cadastro Doador ;)</h3>

        <form method="post" action=""><br><br>
		
    <!-- doador -->
        <form method="post" action="form_cad_doador.php">

            <label>Nome
            <input type="text" name="nome" placeholder="Nome Completo" required><br><br>
            </label>

            <label>E-mail
            <input type="text" name="email" placeholder="Digite seu email" required><br><br>
            </label>

            <label>Telefone
            <input type="text" name="telefone" placeholder="Digite seu telefone" required><br><br>
            </label>

            <label>Cidade
            <input type="text" name="cidade" placeholder="Digite a sua cidade" required><br><br>
            </label>

            <label>Login
            <input type="text" name="login" placeholder="Digite seu login" required><br><br>
            </label>

            <label>Senha
            <input type="text" name="senha" placeholder="Digite a senha" required><br><br>
            </label>
		
	    <form name="foto_usuario" type="text" method="post" enctype="multipart/form-data" action="upload.php">
                    <label>
                        <p>Foto</p> <br><input type="file" name="image" />
                        <input type="submit" id="button_upload" value="Enviar" name="envia" /> 
             </form><br><br><br>		
		
		

            <br><button type="submit" name="enviar" value="1" id="form_botao_cadastrar">Cadastrar Doador</button> 

        </form> 

    <!--INICIO RODAPE -->

        <?php include('../rodape.php'); ?>

    <!--FIM RODAPE -->

    <!-- conexão PHP -->
<?php
    include_once("../conectar.php");
    if(isset($_POST['Post'])){
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $telefone=$_POST['telefone'];
        $cidade=$_POST['cidade'];
        $login=$_POST['login'];
        $senha=$_POST['senha'];
        $imagem=$_POST['imagem'];

    $sql = "INSERT INTO doador (nome, email, telefone, cidade, login_doador, senha_doador, data_cadastro, $imagem) VALUES ('$nome','$email','$telefone','$cidade', '$login', '$senha', NOW(), '$imagem')";
        mysqli_query($conexao,$sql);
        mysqli_close($conexao);
        header('Location: dashboard/painel_doador.php');
    }
?>
