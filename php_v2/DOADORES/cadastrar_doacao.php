<?php 
    include ("conectar.php");
    
    // aqui vai imagem do produto que o doador quer doar
    $msg = false;

    if(isset($_FILES['imagem'])){

        $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); // extensão
        $novo_nome = md5(time()) . $extensao; // nome arquivo
        $diretorio = "upload/"; // diretorio

        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

        $sql_code = "INSERT INTO doacao_solicitacao (id_solicitacao, descricao, motivo, quantidade, categoria, ativo, fk_parceiro, fk_doador, fk_protetor, fk_categoria, data_cadastro, imagem) VALUES (null, '$novo_nome', NOW())";

        if($mysqli->query($sql_code))
            $msg = "Arquivo enviado com Sucesso!";
        else
            $msg = "Falha ao enviar aquivo.";    
    }

?>

<!--INICIO CABEÇALHO-->
    <?php include('cabecalho_doador.php'); ?>
<!--FIM CABEÇALHO-->

<div class="posicao_padrao">

            <h3>CADASTRE UMA DOAÇÃO</h3><br><br>

            <form method="Post" action="doacao_doar.php">

                <label>
                    <p>Nome</p> <br><input type="text" name="descricao" id="id_nome" placeholder="Nome do Objeto"
                        size="60"><br><br>
                </label>

                <label>
                    <p>Descrição</p><br>
                    <textarea name="motivo" rows="5" cols="52"></textarea>
                </label><br><br>

                <label>
                    <p>Quantidade</p> <br><input type="number" name="quantidade">
                </label><br><br>

                <br><label>
                    <p>Categoria</p><br>
                    <select name="categoria" required>
                        <?php 
                            $categoria = "SELECT * FROM categoria";
                            $resultado = mysqli_query($mysqli, $categoria);
                            
                            while($id_categoria=mysqli_fetch_array($resultado)){
                                $id=$id_categoria['id'];
                                $nome=$id_categoria['categoria'];
                                echo "<option value='$id'>$nome</option>";
                            }
                        ?>
                    </select>
                </label><br><br>

                <br><label>
                    <p>Parceiros</p>
                    <select name="parceiro" required>
                        <?php 
                            $categoria = "SELECT * FROM protetor WHERE nomefantasia LIKE '%%' ";
                            $result = mysqli_query($mysqli, $nomefantasia);
                            
                            while($id_parceiro=mysqli_fetch_array($result)){
                                $id=$id_parceiro['id_parceiro'];
                                $nome=$nomefantasia['nomefantasia'];
                                echo "<option value='$id'>$nome</option>";
                            }
                            
                        ?>
                </label>

            </form>
        </div>
        

        <!-- ME PERGUNTANDO POR QUE ESTE BOTÃO COLA NO PARCEIRO -->

        <p><br><br>
            <input id="button" name="Post" type="button" value="Voltar"></a>
        </p> 

        </div>

    <!--INICIO RODAPE -->

        <?php include('rodape.php'); ?>

    <!--FIM RODAPE -->
