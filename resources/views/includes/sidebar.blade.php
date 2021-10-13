<div class="card mb-3">
	<div class="card-body">
		<h5 class="card-title">{{ __('app.search') }}</h5>
        
        <form method="POST" action="{{ route('post.search')}}">
           @csrf
            <div class="input-group">
                <input type="text" placeholder="{{ __('app.keyword') }}" class="form-control" name="Keyword" required>
                <span class="input-group-append"> <button type="submit" class="btn btn-primary"> {{ __('app.search') }}</button></span>
            </div>
        </form>

	</div>
</div>
<div class="card">
    <article class="card-group-item">
        <header class="card-header"><h6 class="title">{{ __('app.categories') }} </h6></header>
        <div class="filter-content">
            <div class="list-group list-group-flush">
                @foreach($categories as $category)
                    <a href="{{route('category', $category->slug)}}" class="list-group-item">{{$category->title}}</a>
                @endforeach
            </div>
        </div>
    </article>
</div> 