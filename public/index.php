<?php
//abrir a sessao


$time = 24 * 60 * 60; // Defini 24 horas

session_set_cookie_params($time);
session_start();
//carregar config
require_once('../config.php');
require_once('../vendor/autoload.php');
require_once('../core/rotas.php');
//carregar classes

