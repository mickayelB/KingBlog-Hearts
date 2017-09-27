<?php

class HomeController{
    public function httpGetMethod(Http $http, array $queryFields){

        $showAllModel = new ShowAllModel();
        $listPost = $showAllModel->findAll();

        return ['listPost' => $listPost];

    }

    public function httpPostMethod(Http $http, array $formFields){

    }
}