<?php

namespace App\Model;

use PDO;
use PDOException;

class Conexao
{
  private static $pdo = null;

  private function __construct()
  {
  }
  private function __clone()
  {
  }

  public static function getInstance()
  {
    try {

      self::$pdo = new PDO("mysql:host=$_SERVER[SERVER_ADDR];dbname=php", 'root', '');
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return self::$pdo;
    } catch (PDOException $e) {
      echo "ERRO BANCO DE DADOS: <br> " . $e->getMessage();
      exit;
    }
  }
}
