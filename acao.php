<?php
if (isset($_POST['pagina'])) {
    switch ($_POST['pagina']) {
        case 'cadUsuario':
            require_once 'view/cadUsuario.php';
            break;
        case 'cadImovel':
            require_once 'view/cadImovel.php';
            break;
        case 'cadFoto':
            require_once 'view/cadFoto.php';
            break;
        case 'listUsuario':
            require_once './view/listUsuario.php';
            break;
        case 'listImoveis':
            require_once 'view/listImoveis.php';
            break;
        case 'editUsuario':
            require_once './view/editUsuario.php';
            break;
        case 'delUsuario':
            require_once './view/listUsuario.php';
            break;
        case 'editImovel':
            require_once './view/editImovel.php';
            break;
        case 'usuarioEditado':
            require_once './view/listUsuario.php';
            break;
        case 'logar':
            require_once './view/login.php';
            break;
        default:
            require_once './menuGeral.php';
            break;
    }
} else if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {
        case 'logar':
            $_SESSION['logado'] = call_user_func(array($usuarioController, 'logar'));
            if ($_SESSION['logado'] == true) {
                $_SESSION['login'] = $_POST['usuario'];
                echo "<meta http-equiv='refresh' content='0'>";
                require_once './menuGeral.php';
            } else {
                require_once './menuGeral.php';
            }
            break;
        case 'editarUsuario':
            call_user_func(array($usuarioController, 'editar'), $_POST['id']);
            require_once './view/listUsuario.php';
            break;
        case 'deletarUsuario':
            call_user_func(array($usuarioController, 'deletar'), $_POST['id']);
            require_once './view/listUsuario.php';
            break;
        case 'salvarUsuario':
            call_user_func(array($usuarioController, 'salvar'));
            if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
                require_once './view/listUsuario.php';
            } else {
                require_once 'menuGeral.php';
            }
            break;
        case 'salvarImovel':
            if (isset($imovel)) {
                call_user_func(array($imovelController, 'salvar'), $imovel->getFoto(), $imovel->getFotoTipo());
            } else {
                call_user_func(array($imovelController, 'salvar'));
            }
            require_once './view/listImoveis.php';
            break;
        case 'deletarImovel':
            call_user_func(array($imovelController, 'deletar'), $_POST['id']);
            require_once './view/listImoveis.php';
            break;
        case 'editarImovel':
            if (isset($imovel)) {
                call_user_func(array($imovelController, 'editar'), $_POST['id'], $imovel->getFoto(), $imovel->getFotoTIpo());
            } else {
                call_user_func(array($imovelController, 'salvar'));
            }
            require_once './view/listImoveis.php';
            break;
        case 'deletarFoto':
            call_user_func(array($galeriaController, 'deletar'), $_POST['idPicture']);
            require_once './view/galeriaImovel.php';
            break;
        case 'listarGaleriaImovel':
            if (isset($_POST['id']) && !isset($_POST['idImovel'])) {
                $idImovel = $_POST['id'];
            } else {
                $idImovel = $_POST['idImovel'];
            }
            call_user_func(array($galeriaController, 'listar'), $idImovel);
            require_once './view/galeriaImovel.php';
            break;
        case 'salvarImagem':
            call_user_func(array($galeriaController, 'salvar'), $_POST['idImovel']);
            require_once './view/galeriaImovel.php';
            break;
        case 'sair':
            session_destroy();
            echo "<meta http-equiv='refresh' content='0'>";
            require_once './menuGeral.php';
            break;
    }
} else {
    require_once './menuGeral.php';
}
