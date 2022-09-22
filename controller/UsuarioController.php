<?php
require_once './model/Usuario.php';

class UsuarioController
{
    /** 
     * Salvar o usuario submetido pelo form 
     */

    public function salvar()
    {
        //cria um objeto do tipo Usuario
        $usuario = new Usuario;

        //armazena as informações do $_POST via set
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha1']);
        $usuario->setPermissao($_POST['permissao']);

        $usuario->save();
    }

    public function listar()
    {
        //cria um objeto do tipo Usuario
        $usuarios = new Usuario();

        return $usuarios->listAll();
    }

    public function editar($id)
    {
        $editUsuarios = new Usuario();
        $editUsuarios->setId($id);
        $editUsuarios->setLogin($_POST['login']);
        $editUsuarios->setSenha($_POST['senha']);
        $editUsuarios->setPermissao($_POST['permissao']);
        return $editUsuarios->edit($id);
    }

    public function encontrar($id)
    {
        $editUsuarios = new Usuario();

        return $editUsuarios->find($id);
    }
    public function deletar($id)
    {
        $delUsuarios = new Usuario();
        return $delUsuarios->remove($id);
    }
    public function logar()
    {
        $usuario = new Usuario();
        $usuario->setLogin($_POST['usuario']);
        $usuario->setSenha($_POST['password']);
        return $usuario->logar();
    }
}


