<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Http\Requests\Web\Comment\CreateCommentRequest;
use App\Http\Requests\Web\Post\SearchPostRequest;

class BlogController extends Controller{

    private $categoryRepository;
    private $postRepository;
    private $commentRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository, PostRepositoryInterface $postRepository, CommentRepositoryInterface $commentRepository){
        $this->categoryRepository = $categoryRepository;
        $this->postRepository     = $postRepository;
        $this->commentRepository  = $commentRepository;
    }

    public function index(){
        $categories = $this->categoryRepository->getAll();
        $posts      = $this->postRepository->getAll();
        return view('home', get_defined_vars());
    }

    public function postBySlug($slug){
        $categories = $this->categoryRepository->getAll();
        $post      = $this->postRepository->getBySlug($slug);
        return view('post', get_defined_vars());
    }

    public function postByCategorySlug($slug){
        $categories = $this->categoryRepository->getAll();
        $posts      = $this->postRepository->getByCategorySlug($slug);
        return view('home', get_defined_vars());
    }

    public function storeComment(CreateCommentRequest $request){
        $data = $request->validated();
        $this->commentRepository->create($data);
        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function postSearch(SearchPostRequest $request){
        $data = $request->validated();
        $categories = $this->categoryRepository->getAll();
        $posts  = $this->postRepository->searchByTitle($data);
        return view('home', get_defined_vars());
    }

    public function showPermissionErrorPage(){
        return view('permission_error'); 
    }
}
