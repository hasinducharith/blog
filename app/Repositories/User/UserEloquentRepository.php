<?php

namespace App\Repositories\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;

class UserEloquentRepository implements UserRepositoryInterface{

    public function getAll(){
        return User::orderBy('id', 'desc')->paginate(10);
    }

    public function getById($id){
        return User::find($id);
    }

    public function create($data){
        $today_date = date("Y-m-d g:i:s");
        $user = User::create($data);
        $user->password = Hash::make($data['password']);  
        $user->email_verified_at  = $today_date;
        $user->save();
        return $user;
    }
    
    public function update($data, $id){
        $user = $this->getById($id);
        $user->update($data);        
        $user->save();
        return $user;
    }

    public function updatePassword($data, $id){
        $user = $this->getById($id);
        $user->password = Hash::make($data['password']);
        $user->save();
        return $user;
    }

    public function delete($id){
        $user = $this->getById($id);
        return $user->delete();
    }
}