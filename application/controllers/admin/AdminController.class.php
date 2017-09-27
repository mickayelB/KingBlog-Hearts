<?php

class AdminController{
    public function httpGetMethod(Http $http, array $queryFields){
        $showPostModel = new ShowPostModel();

        $listPost = $showPostModel->showAdminPost();

        return ['listPost' => $listPost];
    }

    public function httpPostMethod(Http $http, array $formFields){

        $deletePostModel = new DeletePostModel();
        $deletePostModel->deletePost($formFields['id_delete']);
        $flashBag = new FlashBag();
        $flashBag->add('Post supprimé');
        $http->redirectTo('/admin');

    }
}