<?php

namespace Library;

class RepositoryManager
{
    private $pdo;
    private $repositories = array();
    
    public function setPDO(\PDO $pdo)
    {
        $this->pdo = $pdo;
        $pdo->exec("set names utf8");
        
        return $this;
    }
    
    public function getRepository($entity)
    {
        if (empty($this->repositories[$entity])) {
            $repository = "\\Model\\{$entity}";
            $repository = new $repository();
            $repository->setPDO($this->pdo);
            $this->repositories[$entity] = $repository;
        }
        
        return $this->repositories[$entity];
    }
}