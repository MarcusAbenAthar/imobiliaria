<?php
require_once 'Banco.php';
require_once 'Conexao.php';
class Galeria extends Banco
{

    private $idPicture;
    private $idImovel;
    private $path;
    
    public function setIdPicture($idPicture)
    {
        $this->idPicture = $idPicture;
    }
    public function getIdPicture()
    {
        return $this->idPicture;
    }
    public function setPath($path)
    {
        $this->path = $path;
    }
    public function getPath()
    {
        return $this->path;
    }

    public function getIdImovel()
    {
        return $this->idImovel;
    }
    public function setIdImovel($idImovel)
    {
        $this->idImovel = $idImovel;
    }

    public function save()
    {
        $result = false;

        $conexao = new Conexao();

        $query = "insert into galeria (idPicture, idImovel, path) values (null, :idImovel, :path)";

        if ($conn = $conexao->getConection()) {
            $stmt = $conn->prepare($query);
            if ($stmt->execute(array(':idImovel' => $this->idImovel, ':path' => $this->path))) {
                $result = $stmt->rowCount();
            }
        }
        return $result;
    }
        public function listAll()
    {
    }

    public function listAllPictures($id)
    {
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "SELECT * FROM galeria WHERE idImovel = $id";

        $stmt = $conn->prepare($query);

        $result = array();

        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject(Galeria::class)) {
                $result[] = $rs;
            }
        } else {
            $result = false;
        }
        return $result;
    }
    public function remove($idPicture)
    {
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();

        $query = "DELETE FROM galeria WHERE idPicture = :idPicture";
        //preparando a query para execução
        $stmt = $conn->prepare($query);
        if ($stmt->execute(array(':idPicture' => $idPicture))) {
            $result = true;
        }
        return $result;
    }

    public function find($idPicture)
    {
        // $conexao = new Conexao();
        // $conn = $conexao->getConection();

        // $query = "SELECT * from imovel WHERE idPicture = :idPicture";

        // //preparando a query para execução
        // $stmt = $conn->prepare($query);
        // //cria uma array para receber os resultados
        // $result = array();

        // if ($stmt->execute(array(':idPicture' => $idPicture))) {
        //     //o resultado da busca será retornado como um objeto da classe
        //     while ($rs = $stmt->fetchObject(Imovel::class)) {
        //         //armazena esse objeto em uma posição do vetor
        //         $result[] = $rs;
        //     }
        // } else {
        //     $result = false;
        // }
        // return $result;
    }


    public function count()
    {
    }
    public function edit($idPicture)
    {
        //     $conexao = new Conexao();

        //     $conn = $conexao->getConection();

        //     $query = "update imovel set descricao=:descricao, foto=:foto, valor=:valor, tipo=:tipo, fotoTipo = :fotoTipo, path = :path WHERE idPicture=:idPicture";

        //     $dados = [
        //         ':descricao' => $this->getDescricao(),
        //         ':foto' => $this->getFoto(),
        //         ':valor' => $this->getValor(),
        //         ':tipo' => $this->getTipo(),
        //         ':idPicture' => $this->getId(),
        //         ':fotoTipo' => $this->getFotoTipo(),
        //         ':path' => $this->getPath()
        //     ];
        //     $stmt = $conn->prepare($query);
        //     return $stmt->execute($dados);
        // }
    }
}
