@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                <div class="clearfix">
                   <div class="float-left"> Comments </div>
                   <div class="float-right"> 
                      <a href="{{route('post.index')}}" class="btn btn-primary">Back</a>
                   </div>
                 </div>
               </div>
            </div>
           <table class="table mt-5" id="commentTable">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Post</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     $i = 1;
                    ?>
                   @foreach($comments as $comment)
                    <tr>
                        <td>{{$i++}}</td>
                        <td><a href="{{route('post', $comment->post->slug)}}">{{ Str::limit($comment->post->title, $limit = 20, $end='...') }}</a> </td>
                        <td>{{ $comment->name }}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->formated_date()}}</td>
                        <td>
                           <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('post.comment.show', $comment->id)}}" class="btn btn-secondary">View</a>
                                <a href="{{route('post.comment.edit', $comment->id)}}" class="btn btn-waring">Edit</a>
                                <button type="button" data-id="{{$comment->id}}" data-url="{{ route('post.comment.delete', $comment->id)}}" id="deleteComment" class="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
    </div>
</div>
@endsection
