<main class="center">
    <section>
        <div class="row">
            <form name="cadUsuario" id="cadUsuario" method="post">
                Login:<input class="input" type="text" name="login" id="login"><br />
                Senha:<input class="input" type="password" name="senha1" id="senha1"><br />
                Confirmação de senha:<input class="input" type="password" name="senha2" id="senha2"><br />
                Permissão:<select name="permissao" id="permissao">
                    <option value="C">Comum</option>
                    <option value="A">Administrador</option>
                </select><br><br>
                <button class="buttonLink" value="salvarUsuario" name="acao" id="btnSalvar">Salvar</button>
                <?php 
                if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
                ?>
                    <button name="pagina" value="listUsuario" class="buttonLink">Listar Usuários</button>
                <?php
                }
                ?>
                <button name="pagina" value="inicio" class="buttonLink">Inicio</button>
            </form>
        </div>
    </section>
</main>