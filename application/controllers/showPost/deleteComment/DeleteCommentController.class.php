<?php

class DeleteCommentController{
    public function httpGetMethod(Http $http, array $queryFields){

    }

    public function httpPostMethod(Http $http, array $formFields){
        $showPostModel = new ShowPostModel();
        $showPostModel->deleteComment($formFields['deleteComment']);
        $flashBag = new FlashBag();
        $flashBag->add('Commentaire supprimé');
        $http->redirectTo('/showPost?postId='.$formFields['postId']);
    }
}

