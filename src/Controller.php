<?php
namespace agenda;

abstract class Controller{
    protected $container;
    
    public function __construct(\Slim\Container $container) {
        $this->container = $container;
    }
    
    public function __get($chave){
        if($this->container->{$chave}){
            return $this->container->{$chave};
        }
    }
    
}