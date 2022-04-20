<?php

namespace App\View;

class newCadView
{

  /**
   * Método responsável por receber um parametro (nome da view) e exibir essa view
   * @param string $view 
   * @return string
   */
  public static function getContentView($view)
  {
    $file = 'src/view/' . $view . '.php';
    return file_exists($file) ? file_get_contents($file) : '';
  }

  /**
   * Método responsável por receber os dados do controller e montar a tabela e exibir na view
   * @param array $post  
   * @return string
   */
  public static function renderForm($post = false)
  {
    $html = '';
    $html .= '<div class="container-fluid mt-5">';
    if ($post) {
      $html .= '
      <form method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="nome" required value="' . $_POST['nome'] . '">
        </div>
        <div class="mb-3">
          <label for="cpf" class="form-label">CPF</label>
          <input type="number" class="form-control" id="cpf" name="cpf" maxlength="11" required value="' . $_POST['cpf'] . '">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" required value="' . $_POST['email'] . '">
        </div>
        <div class="mb-3">
          <label for="tel" class="form-label">Telefone</label>
          <input type="number" class="form-control" id="telefone" name="telefone" required value="' . $_POST['telefone'] . '">
        </div>
        <div class="mb-3">
          <label for="end" class="form-label">Endereco</label>
          <input type="text" class="form-control" id="endereco" name="endereco" required value="' . $_POST['endereco'] . '">
        </div>
        <a href="?rota=home" class="btn btn-outline-danger">Voltar</a>
        <button type="submit" class="btn btn-outline-success">Cdastrar</button>
      </form>';
    } else {
      $html .= '
      <form method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="nome" required>
        </div>
        <div class="mb-3">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" class="form-control" id="cpf" name="cpf" maxlength="11" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="tel" class="form-label">Telefone</label>
          <input type="number" class="form-control" id="telefone" name="telefone" required>
        </div>
        <div class="mb-3">
          <label for="end" class="form-label">Endereco</label>
          <input type="text" class="form-control" id="endereco" name="endereco" required>
        </div>
        <a href="?rota=home" class="btn btn-outline-danger">Voltar</a>
        <button type="submit" class="btn btn-outline-success">Cdastrar</button>
      </form>';
    }
    return $html;
  }

  /**
   * Método responsável por exibir alerta de status da transaçao com o banco de dados
   * @param string $html (string)   
   * @return string
   */
  public static function alerts($alert)
  {
    $html = '';
    $html .= '<div class="container-fluid mt-2">';
    $html .= '<div class="row">';
    if ($alert['type'] == true) {
      $html .= '<div class="col">';
      $html .= '<div class="bg-success text-white p-2">';
      $html .= $alert['msg'];
      $html .= '</div>';
      $html .= '</div>';
    } else {
      $html .= '<div class="col">';
      $html .= '<div class="bg-danger text-white p-2">';
      $html .= $alert['msg'];
      $html .= '</div>';
      $html .= '</div>';
    }
    $html .= '</div>';
    $html .= '</div>';

    return $html;
  }
}
