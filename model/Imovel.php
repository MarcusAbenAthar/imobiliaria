<?php

require_once 'Banco.php';
require_once 'Conexao.php';

class Imovel extends Banco
{
    private $id;
    private $descricao;
    private $foto;
    private $valor;
    private $tipo;
    private $fotoTipo;
    private $path;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setPath($path)
    {
        $this->path = $path;
    }
    public function getPath()
    {
        return $this->path;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function getFoto()
    {
        return $this->foto;
    }
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }
    public function getFotoTipo()
    {
        return $this->fotoTipo;
    }
    public function setFotoTipo($fotoTipo)
    {
        $this->fotoTipo = $fotoTipo;
    }
    public function getValor()
    {
        return $this->valor;
    }
    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    public function getTipo()
    {
        return $this->tipo;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function save()
    {
        $result = false;

        $conexao = new Conexao();

        $query = "insert into imovel (id, descricao, foto, valor, tipo, fotoTipo, path) values (null, :descricao, :foto, :valor, :tipo, :fotoTipo, :path)";

        if ($conn = $conexao->getConection()) {
            $stmt = $conn->prepare($query);
            if ($stmt->execute(array(':descricao' => $this->descricao, ':foto' => $this->foto, ':valor' => $this->valor, ':tipo' => $this->tipo, ':fotoTipo' => $this->fotoTipo, ':path' => $this->path))) {
                $result = $stmt->rowCount();
            }
        }
        return $result;
    }
    public function listAll()
    {
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "SELECT * FROM imovel";

        $stmt = $conn->prepare($query);

        $result = array();

        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject(Imovel::class)) {
                $result[] = $rs;
            }
        } else {
            $result = false;
        }
        return $result;
    }
    public function remove($id)
    {
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();

        $query = "DELETE FROM imovel WHERE id = :id";
        //preparando a query para execu????o
        $stmt = $conn->prepare($query);
        if ($stmt->execute(array(':id' => $id))) {
            $result = true;
        }
        return $result;
    }

    public function find($id)
    {
        $conexao = new Conexao();
        $conn = $conexao->getConection();

        $query = "SELECT * from imovel WHERE id = :id";

        //preparando a query para execu????o
        $stmt = $conn->prepare($query);
        //cria uma array para receber os resultados
        $result = array();

        if ($stmt->execute(array(':id' => $id))) {
            //o resultado da busca ser?? retornado como um objeto da classe
            while ($rs = $stmt->fetchObject(Imovel::class)) {
                //armazena esse objeto em uma posi????o do vetor
                $result[] = $rs;
            }
        } else {
            $result = false;
        }
        return $result;
    }


    public function count()
    {
    }
    public function edit($id)
    {
        $conexao = new Conexao();

        $conn = $conexao->getConection();

        $query = "update imovel set descricao=:descricao, foto=:foto, valor=:valor, tipo=:tipo, fotoTipo = :fotoTipo, path = :path WHERE id=:id";

        $dados = [
            ':descricao' => $this->getDescricao(),
            ':foto' => $this->getFoto(),
            ':valor' => $this->getValor(),
            ':tipo' => $this->getTipo(),
            ':id' => $this->getId(),
            ':fotoTipo' => $this->getFotoTipo(),
            ':path' => $this->getPath()
        ];
        $stmt = $conn->prepare($query);
        return $stmt->execute($dados);
    }
}
