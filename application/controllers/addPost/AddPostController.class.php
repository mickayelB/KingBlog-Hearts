<?php

class AddPostController{
    public function httpGetMethod(Http $http, array $queryFields){
        $addPostModel = new AddPostModel();
        $allAuthor = $addPostModel->findAuthor();
        $allCat = $addPostModel->findCat();

        return ['authors' => $allAuthor,
                'categories' => $allCat];
    }

    public function httpPostMethod(Http $http, array $formFields){

        try {
            $addPostModel = new AddPostModel();

            $title = $formFields['title'];
            $contents = $formFields['contents'];
            $author = $formFields['author'];
            $category = $formFields['category'];
            $addPostModel->insertPost($title, $contents, $author, $category);
            $flashBag = new FlashBag();
            $flashBag->add('Post créé');
            $http->redirectTo('/');
        }
        catch(Exception $e){
            $errAdd = $e->getMessage();
            return ['errAdd' => $errAdd];
        }
    }
}