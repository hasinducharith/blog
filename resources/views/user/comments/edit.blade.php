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
                      <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                   </div>
                 </div>
               </div>
            </div>

            <form method="POST" action="{{ route('post.comment.update', $comment->id)}}">
                @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$comment->name}}">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control"  id="email" name="email" value="{{$comment->email}}">
                        <input type="hidden" class="form-control" id="post_id" name="post_id" value="{{$comment->post_id}}">
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="feedback">Feedback:</label>
                        <textarea class="form-control" id="feedback" name="feedback" rows="3">{{$comment->feedback}}</textarea>
                        @error('feedback')
                            <div class="alert alert-danger" role="alert">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Post comment</button>
                </form>
         </div>
    </div>
</div>
@endsection
