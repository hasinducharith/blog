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

           <div class="bp-2 mt-3">
                <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{$comment->name}}</span><span class="date text-black-50">Shared publicly - {{$comment->formated_date()}}</span></div>
            </div>
            <div class="mt-2">
                <p class="comment-text">{{$comment->feedback}}</p>
            </div>
         </div>
    </div>
</div>
@endsection
