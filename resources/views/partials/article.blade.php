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
                <i class="fas fa-user-circle"></i> <a href="{{route('post-author', $post->user->name)}}">{{$post->user->name}}</a>
            </li>
            <li class="list-inline-item">
                <i class="fas fa-calendar-o"></i> {{Carbon\Carbon::parse($post->published_at)->format('m/d/Y')}}
            </li>
            <li class="list-inline-item">
                <i class="fas fa-boxes"></i> <a href="{{route('post-category', $post->category->name)}}">{{$post->category->name}}</a>
            </li>
        </ul>
        @if($fullArticle)
            <p>
                {!! $post->post_content !!}
            </p>
        @else
            <p>
                {!! substr($post->post_content,0, strpos($post->post_content, '</p>')+4) !!}
            </p>
            <a href="{{route('blog-post', $post->title)}}" class="btn btn-outline-secondary">Read More</a>
        @endif

        <ul class="post-meta list-inline mt-5">
            @foreach($post->tags as $tag)
                <li class="list-inline-item">
                    <i class="fas fa-tag"></i> <a href="{{route('post-tag',$tag->name)}}">#{{$tag->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</article><!--article-->
