<?php
ob_start();
?>
<h1>Imóveis</h1>
<table class="tableGeral">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Foto</th>
            <th>Valor</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Chama uma função PHP que permite informar a classe e o método que será acionado
        $imoveis = call_user_func(array($imovelController, 'listar'));
        if (isset($imoveis)) {
            foreach ($imoveis as $imovel) {
        ?>
                <form method="post" enctype="multipart/form-data">
                    <tr>
                        <!-- Como o retorno é um objeto, devemos chamar os gets para mostrar o resultado -->
                        <td><?php echo $imovel->getId(); ?></td>
                        <td><?php echo $imovel->getDescricao(); ?></td>
                        <td><img class="fotoCasa" src="data:<?php echo $imovel->getFotoTipo(); ?>;base64, <?php echo base64_encode($imovel->getFoto()); ?>"></td>
                        <td><?php echo $imovel->getValor(); ?></td>
                        <td><?php echo $imovel->getTipo(); ?></td>
                        <td>
                            <input type=" text" name="id" value="<?php echo $imovel->getId() ?>" hidden>
                            <input type=" text" name="idImovel" value="<?php echo $imovel->getId() ?>" hidden>
                            <button class="estiloA" name="acao" value="listarGaleriaImovel">Galeria</button>
                            /
                            <button value="editImovel" name="pagina" class="estiloA">Editar</button>
                            /
                            <button class="estiloA" name="acao" value="deletarImovel">Excluir</button>
                        </td>
                    </tr>
                </form>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5">Nenhum registro encontrado</td>
            </tr>
        <?php
        }
        ?>
        </tr>
    </tbody>
</table>
<form method="post">
    <button name="pagina" value="inicio" class="buttonLink">Início</button>
    <button name="pagina" value="cadImovel" class="buttonLink">Cadastrar Imóvel</button>
</form>


</body>

</html>
<?php
ob_end_flush();
?>