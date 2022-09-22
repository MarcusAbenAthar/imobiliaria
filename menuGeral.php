<nav class="barraNavegacao">
    <div class="divPerson">
        <i class="bi bi-person-circle icone"></i>
        <span class="personName">
            <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
                echo $_SESSION['login'];
            } else {
                echo "Bem vindo!";
            }
            ?>
        </span>
    </div>
    <ul class="ulNavBar">
        <form class="formNav" method="post">
            <li>
                <button class="btnLink" type="submit" name="pagina" value="alugar">Alugar</button>
            </li>
            <li>
                <button class="btnLink" type="submit" name="pagina" value="comprar">Comprar</button>
            </li>
            <?php
            if (!isset($_SESSION['logado']) || $_SESSION['logado'] == false) {
            ?>
                <li>
                    <button class="btnLink" type="submit" name="pagina" value="logar">Login</button>
                </li>
                <li>
                    <button type='submit' name='pagina' class='btnLink' value='cadUsuario'>Cadastre-se</button>
                </li>
            <?php
            } else {
            ?>
                <li>
                    <button class="btnLink" type="submit" name="acao" value="sair">Sair</button>
                </li>
            <?php
            }
            ?>
        </form>
    </ul>
</nav>
<?php
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
?>
    <main>
        <form method='post'>
            <button type='submit' name='pagina' class='buttonLink' value='cadUsuario'>Cadastrar Usuário</button>
            <button type='submit' name='pagina' class='buttonLink' value='cadImovel'>Cadastrar Imóvel</button>
            <button type='submit' name='pagina' class='buttonLink' value='listUsuario'>Listar Usuários</button>
            <button type='submit' name='pagina' class='buttonLink' value='listImoveis'>Listar Imóveis</button>
        </form>
    </main>
<?php
}
?>
