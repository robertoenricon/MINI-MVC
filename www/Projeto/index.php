<?php

require 'autoload.php';

use App\Controller\Pages\HomeController;
use App\Controller\Pages\newCadController;


if (isset($_GET['rota']) && $_GET['rota'] == 'newCad') {
  echo newCadController::getNewCadController();
} else {
  echo HomeController::getHomeController();
}
