    <main class="center">
        <section>
            <div class="row">
                <form name="cadFoto" id="cadFoto" method="post" enctype="multipart/form-data">
                    <?php $galeriaId = $_POST['idImovel'] ?>
                    Foto:<input type="file" name="foto" id="foto" onchange="preview()">
                    <img src="" id="fotoPreview" width="140px" /><br />
                    <input name="idImovel" value="<?php echo $galeriaId; ?>" hidden></input>
                    <button class="buttonLink" value="salvarImagem" name="acao" id="btnSalvar" type="submit">Salvar</button>
                    <button name="pagina" value="listImoveis" class="buttonLink">Listar Imóveis</button>
                    <button name="pagina" value="inicio" class="buttonLink">Inicio</button>
                </form>
            </div>
        </section>
    </main>