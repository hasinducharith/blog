<?php

namespace App\Repositories\Post;

interface PostRepositoryInterface{
    public function getAll();
    public function getById($id);
    public function getBySlug($slug);
    public function create($data, $id);
    public function update($data, $id);
    public function delete($id);
    public function getByCategorySlug($slug);
    public function getByUserId($id);
    public function searchByTitle($data);
}