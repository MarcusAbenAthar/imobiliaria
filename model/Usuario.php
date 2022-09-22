<?php

require_once 'Banco.php';
require_once 'Conexao.php';

class Usuario extends Banco
{

    private $id;
    private $login;
    private $senha;
    private $permissao;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = md5($senha);
    }

    public function getPermissao()
    {
        return $this->permissao;
    }

    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;
    }

    public function save()
    {
        $result = false;

        //cria um objeto do tipo conexao
        $conexao = new Conexao();

        //cria query de inserção passando os atributos que serão armazenados
        $query = "insert into usuario (id, login, senha, permissao) values (null, :login, :senha, :permissao)";

        //cria a conexão com o banco de dados

        if ($conn = $conexao->getConection()) {
            //prepara a query para execução
            $stmt = $conn->prepare($query);
            //executa a query
            if ($stmt->execute(array(':login' => $this->login, ':senha' => $this->senha, ':permissao' => $this->permissao))) {
                $result = $stmt->rowCount();
            }
        }
        return $result;
    }
    public function remove($id)
    {
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();

        $query = "DELETE FROM usuario WHERE id = :id";
        //preparando a query para execução
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

        $query = "SELECT * from usuario WHERE id = :id";

        //preparando a query para execução
        $stmt = $conn->prepare($query);
        //cria uma array para receber os resultados

        if ($stmt->execute(array(':id' => $id))) {
            //o resultado da busca será retornado como um objeto da classe
            while ($rs = $stmt->fetchObject(Usuario::class)) {
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }
        } else {
            $result = false;
        }
        return $result;
    }

    public function listAll()
    {
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "SELECT * FROM usuario";

        //preparando a query para execução
        $stmt = $conn->prepare($query);
        //cria uma array para receber os resultados
        $result = array();

        if ($stmt->execute()) {
            //o resultado da busca será retornado como um objeto da classe
            while ($rs = $stmt->fetchObject(Usuario::class)) {
                //armazena esse objeto em uma posição do vetor
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
        $result = false;
        $query = "update usuario set login=:login, senha=:senha, permissao=:permissao WHERE id=:id";

        $dados = [
            ':login' => $this->getLogin(),
            ':senha' => $this->getSenha(),
            ':permissao' => $this->getPermissao(),
            ':id' => $id
        ];
        $stmt = $conn->prepare($query);
        if ($stmt->execute($dados)) {
            $result = $stmt->rowCount();
        }

        return $result;
    }
    public function logar()
    {
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "SELECT * FROM usuario WHERE login = :usuario AND senha = :password";
        $stmt = $conn->prepare($query);
        if ($stmt->execute(array(':usuario' => $this->getLogin(), ':password' => $this->getSenha()))) {
            if ($stmt->rowCount() > 0) {
                $result = true;
            }
        }
        return $result;
    }
}
