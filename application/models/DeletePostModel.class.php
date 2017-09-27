<?php

class DeletePostModel{

    public function deletePost($postId){
        $database = new Database();

        $sql = 'DELETE FROM Post WHERE Id = ?';
        return $database->executeSql($sql, [$postId]);
    }
}