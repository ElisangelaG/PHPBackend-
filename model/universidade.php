<?php
include __DIR__ . '/Conexao.php';
class Universidade extends Conexao
{
    private $id;
    private $nome;
    private $campus;



    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
    public function getCampus()
    {
        return $this->campus;
    }
    public function setCampus($campus)
    {
        $this->campus = $campus;
        return $this;
    }
    public function insert($obj)
    {
        $sql = "INSERT INTO universidade(nome,campus) VALUES (:nome,:campus)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome',  $obj->nome);
        $consulta->bindValue('campus', $obj->campus);
        $consulta->execute();
        return Conexao::lastId(); /*Aqui vc tem o ID da pessoa, 
        você pode não retornar ele e adicionar uma nova query para inserção e inserir 
        nas duas tabelas ao mesmo tempo se for sempre assim */
    }

    public function update($obj, $id = null)
    {
        $sql = "UPDATE pessoas SET 
            nome = :nome, 
            campus = :campus,            
        WHERE id = :id ";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome', $obj->nome);
        $consulta->bindValue('campus', $obj->campus);
        $consulta->bindValue('id', $id);
        return $consulta->execute();
    }

    public function delete($obj, $id = null)
    {
        $sql =  "DELETE FROM universidade WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id', $id);
        $consulta->execute();
        return $consulta->execute();
    }

    public function find($id = null)
    {
        $sql =  "SELECT * FROM universidade WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id', $id);
        $consulta->execute();
        return $consulta->fetch();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM universidade";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
}
