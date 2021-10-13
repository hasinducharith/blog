<?php

namespace App\Repositories\Comment;

interface CommentRepositoryInterface{
    public function getAll();
    public function getById($id);
    public function getByPostId($id);
    public function create($data);
    public function update($data, $id);
    public function delete($id);
    public function deleteByPost($id);
}