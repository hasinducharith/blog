@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                <div class="clearfix">
                   <div class="float-left"> Post </div>
                   <div class="float-right"> 
                      <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                   </div>
                 </div>
               </div>
            </div>

           <form method="POST" action="{{ route('post.update', $post->id )}}" enctype="multipart/form-data">
           @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
                @error('title')
                    <div class="alert alert-danger" role="alert">
                       {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" class="form-control">
                    <?php foreach($categories as $category):?>
          
                        <option {{ ($category->id == $post->category_id) ? "selected" : " " }}  value="<?php echo $category->id;?>"><?php echo $category->title;?></option>
                    <?php endforeach;?>
                </select>
                @error('category_id')
                    <div class="alert alert-danger" role="alert">
                       {{ $message }}
                    </div>
                @enderror
            </div>
            
                    
            <div class="form-group">
                <label for="image">Image:</label>
                <img  alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{ URL::to('/') .'/images/blog/'. $post->photo}}" data-holder-rendered="true">
                <input type="file" name="image" />
                @error('image')
                    <div class="alert alert-danger" role="alert">
                       {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{$post->description}}</textarea>
                @error('description')
                    <div class="alert alert-danger" role="alert">
                       {{ $message }}
                    </div>
                @enderror
            </div>
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
    </div>
</div>
@endsection
