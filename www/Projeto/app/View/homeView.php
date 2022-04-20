<?php

namespace App\View;

class homeView
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
   * @param array $array (string/numeric)   
   * @param string $error (string)   
   * @return string
   */
  public static function renderTable($array = [], $error = false)
  {
    $html = '';
    $html .= '<div class="container-fluid">';
    $html .= $error ? $error : '';
    $html .= '
    <table class="table table-hover table-sm mt-5">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">E-mail</th>
          <th scope="col">Telefone</th>
          <th scope="col">Endereco</th>
        </tr>
      </thead>
    <tbody>';
    foreach ($array as $val) {
      $html .= '<tr>
        <td>' . $val['ID'] . '</td>
        <td>' . $val['NOME'] . '</td>
        <td>' . $val['CPF'] . '</td>
        <td>' . $val['EMAIL'] . '</td>
        <td>' . $val['TELEFONE'] . '</td>
        <td>' . $val['ENDERECO'] . '</td>
      </tr>';
    }
    $html .= '
        </tbody>
      </table>  
    </div>';
    return $html;
  }

  /**
   * Método responsável por montar o campo de busca e exibir na view, caso eu receba algum valor, eu exibo o valor
   * @param int $search
   * @return string
   */
  public static function renderInputSearch($search = false)
  {
    $html = '';
    $html .= '<div class="container-fluid mt-5">';
    $html .= '<form method="GET">';
    $html .= '<div class="row">';
    $html .= '<div class="col-6"><input type="text" class="form-control mr-4" name="search" placeholder="Buscar por CPF..." value="' . $search . '" ></div>';
    $html .= '<div class="col">';
    if ($search) {
      $html .= '<button type="submit" class="btn btn-outline-danger me-2" name="limpaGET">Limpar</button>';
    }
    $html .= '<button type="submit" class="btn btn-outline-primary">Buscar</button>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</form>';
    $html .= '</div>';
    return $html;
  }

  /**
   * Método responsável por trazer a tabela com o resultado de pesquisa do usuario 
   * @param array $array (string/numeric)
   * @return string
   */
  public static function renderTableSearch($array = [])
  {
    $html = '';
    $html .= '<div class="container-fluid mt-5">
    <table class="table table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">E-mail</th>
          <th scope="col">Telefone</th>
          <th scope="col">Endereco</th>
        </tr>
      </thead>
    <tbody>';

    foreach ($array as $val) {
      $html .= '<tr>
        <td>' . $val['ID'] . '</td>
        <td>' . $val['NOME'] . '</td>
        <td>' . $val['CPF'] . '</td>
        <td>' . $val['EMAIL'] . '</td>
        <td>' . $val['TELEFONE'] . '</td>
        <td>' . $val['ENDERECO'] . '</td>
      </tr>';
    }
    $html .= '
        </tbody>
      </table>  
    </div>';
    return $html;
  }

  /**
   * Método responsável por trazer a paginaçao dentro da tabela na view 
   * @param int $page
   * @return int
   */
  public static function renderPagination($pagination)
  {

    $countPagination = [];
    for ($i = 1; $i <= $pagination; $i++) {
      $countPagination[] = [
        'page' => $i,
      ];
    }

    $html = '';
    $html .= '
    <nav aria-label="Page navigation example">
      <ul class="pagination">';
    foreach ($countPagination as $page) {
      $html .= '<li class="page-item"><a class="page-link" href="?page=' . $page['page'] . '">' . $page['page'] . '</a></li>';
    }
    $html .= ' </ul>
    </nav>';

    return $html;
  }

  /**
   * Método responsável montar o botao de cadastro
   * @param int $page
   * @return int
   */
  public static function renderBtnCad()
  {

    $html = '<div class="container-fluid mt-3">';
    $html .= '<a href="?rota=newCad" class="btn btn-outline-success">Cadastrar</a>';
    $html .= '</div>';

    return $html;
  }
}
