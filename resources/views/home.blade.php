@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-3">
              @include('includes.sidebar')
        </div>

        <div class="col-md-9">
            <div class="row">
                  @include('components.posts') 
                  <div class="col-md-12 justify-content-center">
                     {{$posts->links("pagination::bootstrap-4")}}
                  </div>
             </div>
         </div>
    </div>
</div>
@endsection
