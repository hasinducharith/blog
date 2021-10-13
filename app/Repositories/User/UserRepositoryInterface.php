<?php

namespace App\Repositories\User;

interface UserRepositoryInterface{
    public function getAll();
    public function getById($id);
    public function create($data);
    public function update($data, $id);
    public function updatePassword($data, $id);
    public function delete($id);
}