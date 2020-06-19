<?php

include __DIR__ . '/Conexao.php';

class Pessoa_Universidade extends Conexao
{
    private $id_pessoa;
    private $id_universidade;

    public function getId_Pesoa()
    {
        return $this->id_pessoa;
    }

    public function setId_Pessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }

    public function getId_Universidade()
    {
        return $this->id_universidade;
    }
    public function setId_Universidade($id_universidade)
    {
        $this->id_universidade = $id_universidade;
        return $this;
    }



    public function insert($obj)
    {
        $sql = "INSERT INTO pessoas_universidade(id_pessoa,id_universidade) VALUES (:id_pessoa,:id_universidade)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id_pessoa',  $obj->id_pessoa);
        $consulta->bindValue('id_universidade', $obj->id_universidade);
        $consulta->execute();
        return Conexao::lastId(); /*Aqui vc tem o ID da pessoa, você pode não retornar ele e adicionar uma nova query para inserção e inserir nas duas tabelas ao mesmo tempo se for sempre assim */
    }


    public function findPessoas($id_universidade = null)
    {
        $sql =  "SELECT * FROM pessoas_universidade WHERE id_universidade = :id_universidade";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id_universidade', $id_universidade);
        $consulta->execute();
        return $consulta->fetchAll();
    }
}
