<?php
require_once './model/Galeria.php';

class GaleriaController
{
    public function salvar($id)
    {
        $galeria = new Galeria;
        $imagem = array();
        $path =
        'assets/img/' . $_FILES['foto']['name'];
        $imagem['path'] = $path;
        move_uploaded_file($_FILES['foto']['tmp_name'], $imagem['path']);
        $galeria->setPath($imagem['path']);
        if (!empty($_POST['path'])) {
            unlink($_POST['path']);
        }
        $galeria->setIdImovel($id);
        $galeria->setPath($imagem['path']);
        $galeria->save();
    }
    public function listar($idImovel)
    {
        $galeria = new Galeria();
        return $galeria->listAllPictures($idImovel);
    }
    public function editar($id)
    {
        $editImoveis = new Imovel();

        return $editImoveis->edit($id);
    }
    public function encontrar($id)
    {
        $imoveis = new Imovel();

        return $imoveis->find($id);
    }
    public function deletar($id)
    {
        $delGaleria = new Galeria();
        return $delGaleria->remove($id);
    }
}
