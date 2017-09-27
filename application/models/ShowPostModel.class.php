<?php

class ShowPostModel {

    public function findAllComment($articleId){
        $database = new Database();

        $sql = 'SELECT Comment.Id, NickName, Comment.Contents, Comment.CreationTimestamp, Post_Id
                        FROM Comment, Post
                        WHERE Comment.Post_Id=Post.Id
                        AND Post_Id = ?';
        return $database->query($sql, [$articleId]);
    }

    public function findOnePost($articleId){
        $database = new Database();

        $sql = 'SELECT Post.Id, Title, Contents, CreationTimestamp, Author.FirstName, Author.LastName, Category.Name
                        FROM Post, Author, Category
                        WHERE Post.Author_Id=Author.Id
        AND Post.Category_Id=Category.Id
        AND Post.Id = ?';

        return $database->queryOne($sql, [$articleId]);
    }

    public function addComment($nick, $contents, $articleId){
        $database = new Database();

        $sql = 'INSERT INTO Comment (NickName, Contents, CreationTimestamp, Post_Id) VALUES (?, ?, NOW(), ?)';
        return $database->executeSql($sql, [$nick, $contents, $articleId]);

    }
    public function deleteComment($com){
        $database = new Database();

        $sql = 'DELETE FROM Comment WHERE Id = ?';
        return $database->executeSql($sql, [$com]);

    }

    public function showAdminPost(){
        $database = new Database();

        $sql = 'SELECT Post.Id, Title, Contents, CreationTimestamp, Author.FirstName, Author.LastName, Category.Name
                        FROM Post, Author, Category
                        WHERE Post.Author_Id=Author.Id
                        AND Post.Category_Id=Category.Id
                        ORDER BY CreationTimestamp DESC
                    ';

        return $database->query($sql);
    }

}