<nav class="menuPrincipal">
    <div class="divPerson">
        <i class="bi bi-person-circle icone"></i>
        <span class="personName">
            <?php if (isset($_SESSION['logado'])) {
                echo $_SESSION['login'];
            } else {
                echo "Bem vindo!";
            } ?>
        </span>
    </div>
    <form method="post" class="formMenu">
        <div class="dropdown">
            <button class="buttonLink" data-bs-toggle="dropdown" aria-expanded="false">
                Cadastrar
            </button>
            <ul class="dropdown-menu">
                <li class="liDrop"><button name="pagina" class="dropList" value="cadUsuario">Usuário</button></li>
                <li class="liDrop"><button name="pagina" class="dropList" value="cadImovel">Imóvel</button></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="buttonLink" data-bs-toggle="dropdown" aria-expanded="false">
                Listar
            </button>
            <ul class="dropdown-menu">
                <li class="liDrop"><button name="pagina" class="dropList" value="listUsuario">Usuário</button></li>
                <li class="liDrop"><button name="pagina" class="dropList" value="listImovel">Imóvel</button></li>
            </ul>
        </div>
        <button class="buttonLink" type="submit" name="acao" value="sair">Sair</button>
    </form>
</nav>
