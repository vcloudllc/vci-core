<?php

class QueryBuilder{
  public $pdo;
  public function __construct($pdo){
    $this->pdo = $pdo;
  }

  public function selectAll($table){
    $stmt = $this->pdo->prepare("select * from $table");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS);
  }

  public function insert($table, $params){
    $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)",
    $table,
    implode(', ', array_keys($params)),
    ":".implode(', :', array_keys($params))
  );

  try{
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params);
  } catch (PDOException $e){
    echo $e->getMessage();
  }

}

}
