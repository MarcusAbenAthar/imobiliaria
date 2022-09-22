    <main class="center">
        <section>
            <div class="row">
                <form name="cadUsuario" id="cadUsuario" method="post" enctype="multipart/form-data">
                    <label class="descricao" for="descricao">Descrição:</label>
                    <input type="text" name="descricao" id="descricao"></input>
                    <br />
                    Foto:<input type="file" name="foto" id="foto" onchange="preview()">
                    <img src="" id="fotoPreview" width="140px" /><br />
                    Valor:<input type="text" name="valor" id="valor"><br />
                    Tipo:<select name="tipo" id="tipo">
                        <option value="R">Residencial</option>
                        <option value="C">Comercial</option>
                    </select><br><br>
                    <button class="buttonLink" value="salvarImovel" name="acao" id="btnSalvar" type="submit">Salvar</button>
                    <button name="pagina" value="listImoveis" class="buttonLink">Listar Imóveis</button>
                    <button name="pagina" value="inicio" class="buttonLink">Inicio</button>
                </form>
            </div>
        </section>
    </main>
   