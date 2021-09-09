<?php

namespace App\DAO;

use App\Models\LojasModel;

class LojasDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllLojas(): array
    {
        $lojas = $this->pdo
            ->query('SELECT * FROM lojas')
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $lojas;
    }

    public function insertLoja(LojasModel $loja): void
    {
        $query = $this->pdo
            ->query('

            INSERT INTO lojas 
            (nome, telefone) 
            VALUES
            ("'.$loja->getNome().'","'.$loja->getTelefone().'");
            
            ');
            



        /* $statement = $this->pdo
            ->prepare('INSERT INTO lojas (id, nome, telefone) VALUES(
                :id,
                :nome,
                :telefone
            )');
        
        $id = $loja->getId();
        $id = $id + 1;
        $statement->execute([
            'id' => $id,
            'nome' => $loja->getNome,
            'telefone' => $loja->getTelefone
        ]); */


    }


    public function teste()
    {
        $lojas = $this->pdo
            ->query('SELECT * FROM lojas;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        //echo "<pre>";
        return $lojas;
        
        
    }



}