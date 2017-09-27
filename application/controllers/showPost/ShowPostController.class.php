<?php

class ShowPostController{
    public function httpGetMethod(Http $http, array $queryFields){


        $id = $queryFields['postId'];

        $showPostModel = new ShowPostModel();
        $onePost = $showPostModel->findOnePost($id);
        $comments = $showPostModel->findAllComment($id);

        return ['onePost' => $onePost,
                'comments' => $comments];
    }

    public function httpPostMethod(Http $http, array $formFields){

    }
}

