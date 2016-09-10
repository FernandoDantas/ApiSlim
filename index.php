<?php

ob_start();
session_start();
require_once 'config/DB.php';
require 'vendor/autoload.php';

$app = new Slim\App();

$container = $app->getContainer();
$container["db"]= DB::Conectar();

$container["Compromisso"] = function($container){
    return new agenda\Compromisso($container);
};

$app->get('/listar', "Compromisso:getLista");
$app->get('/buscar/{id}', "Compromisso:getBusca");
$app->get('/excluir/{id}', "Compromisso:excluir");
$app->post('/salvar', "Compromisso:salvar");//Metodo salva e edita

$app->run();
