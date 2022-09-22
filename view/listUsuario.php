    <h1>Usuários</h1>
    <table class="tableGeral">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Senha</th>
                <th>Permissão</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $usuarios = call_user_func(array($usuarioController, 'listar'));
            if (isset($usuarios)) {
                foreach ($usuarios as $usuario) {
            ?>
            <form method="post">
                <tr>
                    <td><?php echo $usuario->getId(); ?></td>
                    <td><?php echo $usuario->getLogin(); ?></td>
                    <td><?php echo $usuario->getSenha(); ?></td>
                    <td><?php echo $usuario->getPermissao(); ?></td>
                    <td>
                        <input hidden type="text" name="id" value="<?php echo $usuario->getId(); ?>">
                        <button value="editUsuario" name="pagina" class="estiloA">Editar</button>
                        /
                        <button class="estiloA" name="acao" value="deletarUsuario">Excluir</button>

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
        <button name="pagina" value="cadUsuario" class="buttonLink">Cadastrar Usuário</button>
    </form>

    </body>

    </html>
