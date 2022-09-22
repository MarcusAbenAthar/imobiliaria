<main>
    <h1>Editar Usuário</h1>
    <hr>
    <div>
        <table class="tableGeral">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Senha</th>
                    <th>Permissão</th>
                </tr>
            </thead>
            <tbody>
                <form method="post">
                    <?php
                    //Chama uma função PHP que permite informar a classe e o método que será acionado
                    $usuarios = call_user_func(array($usuarioController, 'encontrar'), $_POST['id']);
                    if (isset($usuarios)) {
                        foreach ($usuarios as $usuario) {
                    ?>
                            <tr>
                                <!-- Como o retorno é um objeto, devemos chamar os gets para mostrar o resultado -->
                                <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
                                <td><input type="text" name="login" value="<?php echo $usuario->getLogin(); ?>"></td>
                                <td><input type="text" name="senha" value="<?php echo $usuario->getSenha(); ?>"></td>
                                <td><input type="radio" name="permissao" value="A">A<br />
                                <input type="radio" name="permissao" value="C">C</td>
                            </tr>

                    <?php
                        }
                    }
                    ?>
            </tbody>
        </table>
    </div>
    <div class="botao">
        <button name="pagina" value="inicio" class="buttonLink">Início</button>
        <button value="editarUsuario" class="buttonLink" id="btnSalvar" name="acao">Salvar</button>
        <button value="listUsuario" class="buttonLink" name="pagina">Listar Usuários</button>
    </div>
    </form>

</main>
</body>

</html>