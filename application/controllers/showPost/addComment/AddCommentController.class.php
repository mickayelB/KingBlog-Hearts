<?php

class AddCommentController{
    public function httpGetMethod(Http $http, array $queryFields){

    }

    public function httpPostMethod(Http $http, array $formFields){
        $showPostModel = new ShowPostModel();
        $showPostModel->addComment($formFields['pseudo'], $formFields['comment'], $formFields['postId']);
        $flashBag = new FlashBag();
        $flashBag->add('Commentaire ajouté');
        $http->redirectTo('/showPost?postId='.$formFields['postId']);
    }
}

