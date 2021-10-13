<?php

namespace App\Repositories\Comment;

use App\Models\Comment;

class CommentEloquentRepository implements CommentRepositoryInterface{

    public function getAll(){
        return Comment::orderBy('id', 'desc')->get();
    }

    public function getById($id){
        return Comment::find($id);
    }

    public function create($data){
        $comment = Comment::create($data);
        $comment->save();
        return $comment;
    }

    public function update($data, $id){
        $comment = $this->getById($id);
        $comment->update($data);        
        $comment->save();
        return $comment;
    }

    public function delete($id){
        $comment = $this->getById($id);
        return $comment->delete();
    }

    public function deleteByPost($id){
        return Comment::where('post_id', $id)->delete();
    }

    public function getByPostId($post_id){
        return Comment::where('post_id', $post_id)->orderBy('id', 'desc')->get();
    }
}