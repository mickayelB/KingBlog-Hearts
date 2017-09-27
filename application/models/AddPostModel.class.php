<?php

class AddPostModel {
    public function findAuthor(){
        $database = new Database();

        $sql = 'select Id, FirstName, LastName from Author';
        return $database->query($sql);
    }
    public function findCat(){
        $database = new Database();

        $sql = 'select Id, Name from Category';
        return $database->query($sql);
    }

    public function insertPost($title, $contents, $author, $category){
        $database = new Database();

        $query = 'insert into Post (Title, Contents, CreationTimestamp, Author_Id, Category_Id) values (?, ?, NOW(), ?, ?)';
        return $database->executeSql($query, array($title, $contents, $author, $category));
    }
}