<div class="article-card">
    <a href="{{route('blog-post', $post->title)}}">
        <div class="article-card__image">
            <div class="article-card__image--text">
                <div>Read More</div>
                <div><i class="fas fa-arrow-right"></i></div>
            </div>
            <div class="article-card__image--img">
                @if($post->header_image)
                    <img class="img--fluid" src="{{$post->header_image}}" alt="any">
                @else
                    <img class="img--fluid" src="{{url(sprintf("images/farm_stock_%s.jpg",rand(1,20)))}}" alt="any">
                @endif
            </div>
        </div>
        <div class="article-card__body">
            <h4 class="h4__title">{{$post->title}}</h4>
            <p class="p__content--lead">{{$post->summary}}</p>
        </div>
    </a>
</div>
