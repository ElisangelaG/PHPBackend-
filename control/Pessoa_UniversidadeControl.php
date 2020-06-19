<?php

include __DIR__ . '/../model/Pessoa_Universidade.php';
class Pessoa_UniversidadeControl

{
    function insert($obj)
    {
        $Pessoa_Universidade = new Pessoa_Universidade();
        /* CHANCE DE MANIPULAR A REQUISIÇÃO ANTES DE ACESSAR O MODEL */
        return $Pessoa_Universidade->insert($obj);
    }


    function find($id = null)
    {
        $Pessoa_Universidade = new Pessoa_Universidade();
        return $Pessoa_Universidade->findPessoas($id);
    }
}
