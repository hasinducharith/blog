@if(count($posts) > 0)
    @foreach($posts as $post)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary">{{$post->category->title}}</strong>
                <h3 class="mb-0">
                    <a class="text-dark" href="{{route('post', $post->slug)}}">{{ Str::limit($post->title, $limit = 20, $end='.')}}</a>
                </h3>
                <div class="mb-1 text-muted">{{$post->formated_date()}}</div>
                <p class="card-text mb-auto">{{ Str::limit($post->description, $limit = 50, $end='...')}}</p>
                <a href="{{route('post', $post->slug)}}">{{ __('app.continue_reading') }}</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block"  alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{ URL::to('/') .'/images/blog/'. $post->photo}}" data-holder-rendered="true">
            </div>
        </div>
    @endforeach
@else
        <div class="col-md-12 text-center mt-5">
             <h1>{{ __('app.no_posts_available') }}</h1>
        </div>
@endif