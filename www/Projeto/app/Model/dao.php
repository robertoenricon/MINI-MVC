<?php

namespace App\Model;

use App\Model\conexao;

use PDO;
use PDOException;

class Dao
{
  private $pdo = null;

  public function __construct()
  {
    $this->pdo = Conexao::getInstance();
  }

  /**
   * Método responsável por trazer a quantidade de registros no banco para montar a paginaçao
   * @param int $page
   * @return string
   */
  public function pagination()
  {
    $stmt = $this->pdo->query("SELECT COUNT(*) qtd FROM cliente");
    $stmt->execute();

    $qtd = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $qtd = $qtd[0]['qtd'];

    //calcula quantidade de paginas
    $qtdPages = $qtd > 0 ? ceil($qtd / 10) : 1;

    return $qtdPages;
  }

  /**
   * Método responsável exibir todos os registro do banco com limite por paginas e com paginacao recebendo o valor via parametro
   * @param int $page
   * @return string
   */
  public function all($page)
  {

    $offset = (10 * ($page - 1));

    $stmt = $this->pdo->query("SELECT * FROM cliente LIMIT 10 OFFSET $offset");
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
  }

  /**
   * Método responsável buscar o parametro informado na base de dados
   * @param int $search
   * @param int $page
   * @return string
   */
  public function search($page, $search)
  {

    if ($page) { //se eu tiver $page eu trago todos com paginaçao
      $offset = (10 * ($page - 1));

      $query = "SELECT * FROM cliente WHERE CPF = '$search' LIMIT 10 OFFSET $offset";

      $stmt = $this->pdo->query($query);
      $stmt->execute();
    } else { //se eu nao tiver page é pq eu busco somente um registro

      $cpf = $search['cpf'];

      $query = "SELECT * FROM cliente WHERE CPF = '$cpf'";

      $stmt = $this->pdo->query($query);
      $stmt->execute();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
      return $result;
    } else {
      return array(
        "type" => false,
        "msg" => "Nenhum registro encontrado"
      );
    }
  }

  /**
   * Método responsável por inserir registros no banco de dados
   * @param array $post
   * @return string
   */
  public function insert($post)
  {
    $sql = "INSERT INTO cliente (NOME, CPF, EMAIL, TELEFONE, ENDERECO) VALUES (:nome, :cpf, :email, :telefone, :endereco)";

    try {
      $nome = $post['nome'];
      $cpf = $post['cpf'];
      $email = $post['email'];
      $telefone = $post['telefone'];
      $endereco = $post['endereco'];

      $this->pdo->beginTransaction();

      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":nome", $nome);
      $stmt->bindParam(":cpf", $cpf);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":telefone", $telefone);
      $stmt->bindParam(":endereco", $endereco);

      $stmt->execute();

      $this->pdo->commit();
      return array(
        "type" => true,
        "msg" => "Cadastro <b>realizado</b> com sucesso!"
      );
    } catch (PDOException $e) {
      $this->pdo->rollback();
      return array(
        "type" => false,
        "msg" => "Erro ao realizar o cadastro. </br>Motivo -> {$e->getMessage()}"
      );
    }
  }

  /**
   * Método responsável por atualizar registros no banco de dados
   * @param array $update
   * @param array $search
   * @return string
   */
  public function update($search, $update)
  {

    $sql = "UPDATE cliente SET nome = :nome, cpf = :cpf, email = :email, telefone = :telefone, endereco = :endereco WHERE id = :id";

    try {
      $id = $search[0]['ID'];
      $nome = $update['nome'];
      $cpf = $update['cpf'];
      $email = $update['email'];
      $telefone = $update['telefone'];
      $endereco = $update['endereco'];

      $this->pdo->beginTransaction();

      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->bindParam(":nome", $nome);
      $stmt->bindParam(":cpf", $cpf);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":telefone", $telefone);
      $stmt->bindParam(":endereco", $endereco);

      $stmt->execute();

      $this->pdo->commit();
      return array(
        "type" => true,
        "msg" => "Cadastro <b>atualizado</b> com sucesso!"
      );
    } catch (PDOException $e) {
      $this->pdo->rollback();
      return array(
        "type" => false,
        "msg" => "Erro ao atualizar o cadastro. </br> Motivo -> {$e->getMessage()}"
      );
    }
  }
}
