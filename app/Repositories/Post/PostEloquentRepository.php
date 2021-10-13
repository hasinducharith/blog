<?php

namespace App\Repositories\Post;

use Illuminate\Support\Str;

use App\Models\Post;
use App\Repositories\Category\CategoryRepositoryInterface;

class PostEloquentRepository implements PostRepositoryInterface{

    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll(){
        return Post::orderBy('id', 'desc')->paginate(10);
    }

    public function getById($id){
        return Post::find($id);
    }

    public function getBySlug($slug){
        return Post::where('slug', $slug)->first();
    }

    public function getByCategorySlug($slug){
        $category = $this->categoryRepository->getBySlug($slug);
        return Post::where('category_id', $category->id)->orderBy('id', 'desc')->paginate(10);
    }

    public function create($data, $id){
        $filename = time().$data['image']->getClientOriginalName();
        $data['image']->move(public_path('images/blog/'), $filename); 
        $data['photo'] = $filename;
        $data['user_id'] = $id;
        $data['slug'] = Str::slug($data['title']);
        $post = Post::create($data);
        $post->save();
        return $post;
    }
    
    public function update($data, $id){
        $post = $this->getById($id);
        if(isset($data['image'])){
          if($post->photo != 'default.jpg'){
            $previous_image_path = public_path().'/images/blog/'.$post->photo;
            unlink($previous_image_path);
          }

          $filename = time().$data['image']->getClientOriginalName();
          $data['image']->move(public_path('images/blog/'), $filename); 
          $data['photo'] = $filename;
        }
        $post->update($data);        
        $post->save();
        return $post;
    }

    public function delete($id){
        $post = $this->getById($id);
        if($post->photo != 'default.jpg'){
            $previous_image_path = public_path().'/images/blog/'.$post->photo;
            unlink($previous_image_path);
        }
        return $post->delete();
    }

    public function getByUserId($id){
        return Post::where('user_id', $id)->orderBy('id', 'desc')->paginate(10);
    }

    public function searchByTitle($data){
        return Post::where('title', 'LIKE', '%' . $data['Keyword'] . '%')->orderBy('id', 'desc')->paginate(10);
    }
}