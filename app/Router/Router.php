<?php
// Created by Icecream <icecream@jokyprod.com>


namespace App\Router;

class Router
{
    private $method;
    private $route;
    private $controller;
    private $serverURI;
    private $allroute = array();
    private $allController = array();
    private $isController = true;


    public function __construct()
    {

    }

    public function add($route,$controller)
    {
        $this->route = $route;
        $this->controller = new $controller;
        $this->setRoute();
    }

    public function run()
    {
        $this->serverURI = $_SERVER["REQUEST_URI"];

        $exc = $this->checkRoute();

        if ($exc)
        {
            exit("404 exception");
        }


        $idController = $this->findIdController();

        $this->allController[$idController]->index();


    }

    private function setRoute()
    {
        array_push($this->allroute, $this->route);
        array_push($this->allController, $this->controller);

//        var_dump($this->allroute);
//        var_dump($this->allController);
    }

    private function checkRoute()
    {
        foreach ($this->allroute as $k)
        {
            if ($k == $this->serverURI)
            {
                return false;
            }
        }
        return true;
    }

    private function findIdController()
    {
        $k = 0;
        foreach ($this->allroute as $i)
        {
            if ($i == $this->serverURI)
            {
                return $k;
                break;
            }
            $k++;
        }

    }


}