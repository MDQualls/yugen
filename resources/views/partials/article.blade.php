<article class="article-post mb70">
    @if($post->header_image)
        <a class="post-thumb mb30" href="#">
            <img src="{{$post->header_image}}" alt="" class="img-fluid">
            <div class="post-overlay">
                <span>{{$post->title}}</span>
            </div>
        </a><!--thumb-->
    @endif
    <div class="post-content">
        <a href="#"><h2 class="post-title">{{$post->title}}</h2></a>
        <ul class="post-meta list-inline">
            <li class="list-inline-item">
                <i class="fas fa-user-circle"></i> <a href="#">{{$post->user->name}}</a>
            </li>
            <li class="list-inline-item">
                <i class="fas fa-calendar-o"></i> <a href="#">{{Carbon\Carbon::parse($post->published_at)->format('m/d/Y')}}</a>
            </li>
            <li class="list-inline-item">
                <i class="fas fa-tag"></i> <a href="#">{{$post->category->name}}</a>
            </li>
        </ul>
        @if($fullArticle)
            <p>
                {!! $post->post_content !!}
            </p>
        @else
            <p>
                {!! Str::limit($post->post_content, strpos($post->post_content, '</p>')+4) !!}
            </p>
            <a href="{{route('blog-post', $post->id)}}" class="btn btn-outline-secondary">Read More</a>
        @endif
    </div>
</article><!--article-->
