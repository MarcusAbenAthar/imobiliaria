<main>
    <h1>Editar Imóvel</h1>
    <hr>
    <div>
        <table class="tableGeral">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Foto</th>
                    <th>Preview da Foto</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Chama uma função PHP que permite informar a classe e o método que será acionado
                $imoveis = call_user_func(array($imovelController, 'encontrar'), $_POST['id']);
                if (isset($imoveis)) {
                    foreach ($imoveis as $imovel) {
                ?>
                        <form method="post" enctype="multipart/form-data">
                            <tr>
                                <!-- Como o retorno é um objeto, devemos chamar os gets para mostrar o resultado -->
                                <input type="hidden" name="id" value="<?php echo $imovel->getId(); ?>">
                                <!-- <input type="hidden" name="path" value="<?php echo $imovel->getPath(); ?>">
                                <input type="hidden" name="fotoTipo" value="<?php echo $imovel->getFotoTipo(); ?>">
                                <input type="hidden" name="foto" value="<?php echo $imovel->getFoto(); ?>"> -->
                                <td><input type="text" name="descricao" value="<?php echo $imovel->getDescricao(); ?>"></td>
                                <td><input type="file" name="foto" value="<?php echo $imovel->getPath(); ?>" onchange="readURL(this)"></td>
                                <td><img class="foto" width="140px" id="fotoAtual" src="data:<?php echo $imovel->getFotoTipo(); ?>;base64, <?php echo base64_encode($imovel->getFoto()); ?>"></td>
                                <td><input type="text" name="valor" value="<?php echo $imovel->getValor(); ?>"></td>
                                <td><input type="radio" name="tipo" id="tipo" value="R">Residencial<br />
                                    <input type="radio" name="tipo" id="tipo" value="C">Comercial
                                </td>
                            </tr>

                    <?php
                    }
                }
                    ?>
            </tbody>
        </table>
    </div>
    <div class=" botao">
        <button name="pagina" value="inicio" class="buttonLink">Início</button>
        <button class="buttonLink" name="acao" value="editarImovel">Salvar</button>
        <button name="pagina" value="listImoveis" class="buttonLink">Listar Imóveis</button>
    </div>
    </form>
</main>
</body>

</html>