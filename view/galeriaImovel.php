<?php
ob_start();
?>
<h1>Galeria</h1>
<table class="tableGeral">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_POST['id']) && !isset($_POST['idImovel'])){            
            $idImovel = $_POST['id'];
        }else{
            $idImovel = $_POST['idImovel'];
        }
        //Chama uma função PHP que permite informar a classe e o método que será acionado
        $galeria = call_user_func(array($galeriaController, 'listar'), $idImovel);

        if (isset($galeria)) {
            foreach ($galeria as $foto) {
        ?>
                <form method="post" enctype="multipart/form-data">
                    <tr>
                        <!-- Como o retorno é um objeto, devemos chamar os gets para mostrar o resultado -->
                        <td><img class="fotoCasa" src="<?php echo $foto->getPath() ?>"></td>
                        <td>
                            <input type=" text" name="idImovel" value="<?php echo $foto->getIdImovel() ?>" hidden></input>
                            <input type=" text" name="idPicture" value="<?php echo $foto->getIdPicture() ?>" hidden></input>
                            <button class="estiloA" name="acao" value="deletarFoto">Excluir</button>
                        </td>
                    </tr>
                </form>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="2">Nenhum registro encontrado</td>
            </tr>
        <?php
        }
        ?>
        </tr>
    </tbody>
</table>
<form method="post">
    <input name="idImovel" value="<?php echo $_POST['idImovel']; ?>" hidden></input>    
    <button name="pagina" value="inicio" class="buttonLink">Início</button>
    <button name="pagina" value="listImoveis" class="buttonLink">Listar Imóveis</button>
    <button name="pagina" value="cadFoto" class="buttonLink">Adicionar Fotos</button>
</form>


</body>

</html>
<?php
ob_end_flush();
?>