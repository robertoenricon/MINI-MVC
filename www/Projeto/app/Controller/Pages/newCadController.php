<?php

namespace App\Controller\Pages;

use \App\View\newCadView;
use \App\Model\Dao;

class newCadController
{

  /**
   * Método responsável pela renderizacao da tela de home
   * @return string
   */
  public static function getNewCadController()
  {

    echo newCadView::getContentView('pages/newCad');

    if (isset($_POST) && !empty($_POST)) { //se eu possuir um POST alimentado

      $dao = new Dao;

      $search = $dao->search(false, $_POST);

      if (!isset($search['type'])) { //Se nao me retornar o type, é pq eu tenho registro no banco com o mesmo CPF, entao eu faço um update
        $res = $dao->update($search, $_POST);
      } else { //Se me retornar o type, é pq eu nao tenho registro no banco com o mesmo CPF
        $res = $dao->insert($_POST);
      }

      echo newCadView::alerts($res); //exibo os alertas de sucesso ou erro

      echo newCadView::renderForm($_POST); //trago o formulario preenchido com os valores anteriores da requisição
      unset($_POST);
    } else {
      echo newCadView::renderForm(); //trago o formulario preenchido com os valores em branco
    }
  }
}
