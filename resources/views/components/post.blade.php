<div class="blog-post">
    <h2 class="blog-post-title">{{$post->title}}</h2>
    <p class="blog-post-meta">{{$post->formated_date()}} by <a href="#">{{$post->user->name}}</a></p>
    <div class="jumbotron p-3 p-md-5">
       <img class="img-fluid"  alt="Thumbnail [200x250]"  src="{{ URL::to('/') .'/images/blog/'. $post->photo}}" data-holder-rendered="true">
    </div>
    <p>{{$post->description}}</p>
</div>