<?php

/**
 * Created by PhpStorm.
 * User: clguilbert
 * Date: 18/11/17
 * Time: 11:24
 */
class Connection extends PDO
{
    private $stmt;
    public function __construct($dsn, $username, $password){
        parent::__construct($dsn, $username, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function executeQuery($query, array $parameters=[]){
        $this->stmt=parent::prepare($query);
        foreach ($parameters as $name=>$value){
            $this->stmt->bindValue($name,$value[0],$value[1]);
        }
        return $this->stmt->execute();
    }
    public function getResults(){
        return $this->stmt->fetchall();
    }
}