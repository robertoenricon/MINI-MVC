<?php

namespace App\Controller\Pages;

use \App\View\homeView;
use \App\Model\Dao;

class HomeController
{

  /**
   * Método responsável pela renderizacao da tela de home
   * @return string
   */
  public static function getHomeController()
  {
    $dao = new Dao;

    if (isset($_GET['limpaGET'])) {
      unset($_GET['search']);
    }

    $page = isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : 1;

    $searchGET = isset($_GET['search']) && !empty($_GET['search']) ? $_GET['search'] : false;

    echo homeView::renderBtnCad();

    echo homeView::getContentView('pages/home');

    echo homeView::renderInputSearch($searchGET);

    if (!empty($searchGET)) { //Caso eu tenha algum valor na URL, eu realizo a busca
      $search = $dao->search($page, $searchGET);

      if (isset($search['type']) && $search['type'] != true) { //Se eu nao encontrar nenhum valor, eu trago todos os registro junto com a mensagem de nenhum registo encontrado
        $all = $dao->all($page);
        echo homeView::renderTable($all, $search['msg']);
      } else {
        echo homeView::renderTableSearch($search);
      }
    } else { //Se eu náo possuir valor no GET, trago todos os registros
      $all = $dao->all($page);
      echo homeView::renderTable($all, false);
    }

    $pagination = $dao->pagination();
    echo homeView::renderPagination($pagination);
  }
}
