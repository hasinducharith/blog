@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                <div class="clearfix">
                   <div class="float-left"> Posts </div>
                   <div class="float-right"> 
                      <a href="{{route('post.create')}}" class="btn btn-primary">Create</a>
                   </div>
                 </div>
               </div>
            </div>
            @if(count($posts) > 0)
            <table class="table mt-5" id="userTable">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     $i = 1;
                    ?>
                   @foreach($posts as $post)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ Str::limit($post->title, $limit = 20, $end='...')}}</td>
                        <td>{{$post->category->title}}</td>
                        <td>
                           <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('post.comment', $post->id)}}" class="btn btn-secondary">Comments</a>
                                <a href="{{route('post.edit', $post->id)}}" class="btn btn-waring">Edit</a>
                                <button type="button" data-id="{{$post->id}}" data-url="{{ route('post.delete', $post->id) }}" id="deletePost" class="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
              <h2 class="text-center mt-5">No Post found</h2>
            @endif
         </div>
    </div>
</div>
@endsection
