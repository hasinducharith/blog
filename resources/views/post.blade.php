@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-3">
            @include('includes.sidebar')
        </div>
        <div class="col-md-9">
           @include('components.post')
            <hr>
            <div class="text-left">
                <h6>{{ __('app.all_comment') }}</h6>
            </div>
           <div class="d-flex flex-column comment-section">
                <form method="POST" action="{{ route('post.create.comment')}}">
                @csrf
                    <div class="form-group">
                        <label for="name">{{ __('app.name') }}:</label>
                        <input 
                        type="text" 
                        class="form-control"
                        id="name" 
                        name="name"
                        value="@auth {{Auth::user()->name}} @endauth"
                        />
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('app.email') }}:</label>
                        <input 
                        type="email" 
                        class="form-control"  
                        id="email" 
                        name="email"
                        value="@auth {{Auth::user()->email}} @endauth"
                        />
                        <input type="hidden" class="form-control" id="post_id" name="post_id" value="{{$post->id}}">
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="feedback">{{ __('app.feedback') }}:</label>
                        <textarea class="form-control" id="feedback" name="feedback" rows="3"></textarea>
                        @error('feedback')
                            <div class="alert alert-danger" role="alert">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('app.post_comment') }}</button>
                </form>        
           </div>
                <div class="row">
                    
                   <div class="col-md-12">
                        @if ($post->comments)
                            @foreach($post->comments as $comment)
                            <hr>
                                <div class="bp-2 mt-3">
                                    <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{$comment->name}}</span><span class="date text-black-50">Shared publicly - {{$comment->formated_date()}}</span></div>
                                </div>
                                <div class="mt-2">
                                    <p class="comment-text">{{$comment->feedback}}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
