<?php
//abrir a sessao

use core\classes\Database;
use core\classes\Functions;

session_start();

//carregar config
require_once('../../config.php');
require_once('../../vendor/autoload.php');
require_once('../../core/rotas_admin.php');
//carregar classes

