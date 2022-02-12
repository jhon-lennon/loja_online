<?php
//abrir a sessao

use core\classes\Database;

session_start();

//carregar config
require_once('../config.php');
require_once('../vendor/autoload.php');
//carregar classes

$db = new Database();
$produtos = $db->select('SELECT * FROM produtos');
echo"<pre>";
print_r($produtos);
echo"<br>";
echo $produtos[0]->nome;
