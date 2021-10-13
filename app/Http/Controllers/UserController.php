<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Http\Requests\Web\Post\UpdatePostRequest;
use App\Http\Requests\Web\Post\CreatePostRequest;
use App\Http\Requests\Web\Comment\CreateCommentRequest;

class UserController extends Controller{

    private $postRepository;
    private $categoryRepository;
    private $commentRepository;

    public function __construct(PostRepositoryInterface $postRepository, CategoryRepositoryInterface $categoryRepository, CommentRepositoryInterface $commentRepository){
        $this->postRepository     = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->commentRepository  = $commentRepository;
    }


    public function index(){
        $user_id = auth()->user()->id;
        $posts = $this->postRepository->getByUserId($user_id);
        return view('user.posts.index', get_defined_vars());
    }

    public function postEdit($id){
        $post = $this->postRepository->getById($id);
        $categories = $this->categoryRepository->getAll();
        return view('user.posts.edit', get_defined_vars());
    }

    public function postCreate(){
        $categories = $this->categoryRepository->getAll();
        return view('user.posts.create', get_defined_vars());
    }

    public function postStore(CreatePostRequest $request){
        $user_id = auth()->user()->id;
        $data = $request->validated();
        $this->postRepository->create($data, $user_id);
        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }

    public function postUpdate(UpdatePostRequest $request, $id){
        $data = $request->validated();
        $this->postRepository->update($data, $id);
        return redirect()->route('post.index')->with('success', 'Post updated successfully!');
    }

    public function postDestroy($id){
        $this->postRepository->delete($id);
        $this->commentRepository->deleteByPost($id);
        return response()->json(['type' => 'success', 'message' => 'Post has been deleted'], 200);
    }

    public function postComment($id){
        $comments = $this->commentRepository->getByPostId($id);
        return view('user.comments.index', get_defined_vars());
    }

    public function commentShow($id){
        $comment = $this->commentRepository->getById($id);
        return view('user.comments.show', get_defined_vars());
    }

    public function commentEdit($id){
        $comment = $this->commentRepository->getById($id);
        return view('user.comments.edit', get_defined_vars());
    }

    public function commentUpdate(CreateCommentRequest $request, $id){
        $data = $request->validated();
        $this->commentRepository->update($data, $id);
        return redirect()->back()->with('success', 'Comment updated successfully!');
    }

    public function CommentDestroy($id){
        $this->commentRepository->delete($id);
        return response()->json(['type' => 'success', 'message' => 'Comment has been deleted'], 200);
    }
}
