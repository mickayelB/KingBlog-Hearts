<?php

class ShowAllModel {
    public function findAll(){
        $database = new Database();

        $sql = 'SELECT Post.Id, Title, Contents, CreationTimestamp, Author.FirstName, Author.LastName, Category.Name
                        FROM Post, Author, Category
                        WHERE Post.Author_Id=Author.Id
                        AND Post.Category_Id=Category.Id
                    ';
        return $database->query($sql);
    }
}