<?php
require_once './model/Imovel.php';

class ImovelController
{
    public function salvar($fotoAtual = "", $fotoTipo = "")
    {
        $imovel = new Imovel();
        $imagem = array();
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $imagem['data'] = file_get_contents($_FILES['foto']['tmp_name']);
            $imagem['tipo'] = $_FILES['foto']['type'];
            $imagem['path'] = 'assets/img/' . $_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'], $imagem['path']);
        }
        if (!empty($imagem)) {
            $imovel->setFoto($imagem['data']);
            $imovel->setFotoTipo($imagem['tipo']);
            $imovel->setPath($imagem['path']);
            if (!empty($_POST['path'])) {
                unlink($_POST['path']);
            }
        } else {
            $imovel->setFoto($fotoAtual);
            $imovel->setFotoTipo($fotoTipo);
        }
        $imovel->setDescricao($_POST['descricao']);
        $imovel->setValor($_POST['valor']);
        $imovel->setTipo($_POST['tipo']);
        $imovel->save();
    }
    public function listar()
    {
        $imoveis = new Imovel();

        return $imoveis->listAll();
    }
    public function editar($id, $fotoAtual = "", $fotoTipo = "")
    {
        $editImoveis = new Imovel();
        $imagem = array();
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $imagem['data'] = file_get_contents($_FILES['foto']['tmp_name']);
            $imagem['tipo'] = $_FILES['foto']['type'];
            $path =
            'assets/img/' . $_FILES['foto']['name'];
            $imagem['path'] = $path;
            move_uploaded_file($_FILES['foto']['tmp_name'], $imagem['path']);
        }
        if (!empty($imagem)) {
            $editImoveis->setFoto($imagem['data']);
            $editImoveis->setFotoTipo($imagem['tipo']);
            $editImoveis->setPath($imagem['path']);
            if (!empty($_POST['path'])) {
                unlink($_POST['path']);
            }
        } else {
            $editImoveis->setFoto($fotoAtual);
            $editImoveis->setFotoTipo($fotoTipo);
        }
        $editImoveis->setDescricao($_POST['descricao']);
        $editImoveis->setValor($_POST['valor']);
        $editImoveis->setTipo($_POST['tipo']);
        return $editImoveis->edit($id);
    }
    public function encontrar($id)
    {
        $imoveis = new Imovel();

        return $imoveis->find($id);
    }
    public function deletar($id)
    {
        $delImoveis = new Imovel();
        return $delImoveis->remove($id);
    }
}
