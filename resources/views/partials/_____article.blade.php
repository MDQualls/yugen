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
                <i class="fas fa-user-circle"></i> <a
                    href="{{route('post-author', $post->user->name)}}">{{$post->user->name}}</a>
            </li>
            <li class="list-inline-item">
                <i class="fas fa-calendar-o"></i> {{Carbon\Carbon::parse($post->published_at)->format('m/d/Y')}}
            </li>
            <li class="list-inline-item">
                <i class="fas fa-boxes"></i> <a
                    href="{{route('post-category', $post->category->name)}}">{{$post->category->name}}</a>
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
            <a href="{{route('blog-post', $post->title)}}" class="btn btn-outline-secondary mb-2">Read More</a>
        @endif

        @if($post->tags->count() > 0)
            <ul class="post-meta list-inline">
                @foreach($post->tags as $tag)
                    <li class="list-inline-item">
                        <i class="fas fa-tag"></i> <a href="{{route('post-tag',$tag->name)}}">#{{$tag->name}}</a>
                    </li>
                @endforeach
            </ul>
        @endif

        @if($fullArticle)

            @if($post->comments->count() > 0)
                <hr class="mb20">
                <h4 class="mb20 text-uppercase font500 pt-1">Comments</h4>
                @foreach($post->comments->where('parent_comment_id','=', 0) as $comment)
                    @include('partials.postcomment', ['comment' => $comment])
                @endforeach
            @endif
            <hr class="mb20">
            <h4 class="mb20 text-uppercase font500">Post a comment</h4>

            @include('partials.errors')

            <form id="comment-form" method="post" action="{{route('post-comment', ['post' => $post->id])}}" role="form">
                @csrf
                <input type="hidden" id="parent_comment_id" name="parent_comment_id" value="">
                <div class="form-group">
                    <label>Comment</label>
                    <textarea id="comment" name="comment" class="form-control" rows="3"
                              placeholder="Comment" required></textarea>
                </div>
                <div class="clearfix float-right">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>

            @if($post->comments->count() > 0)
                <div class="comment-reply-form-container mt-5">
                    <form id="commentReplyForm" method="post" action="{{route('post-reply', ['post' => $post->id])}}">
                        @csrf
                        <input type="hidden" id="parent_comment_id" name="parent_comment_id" value="">
                        <div class="form-group">
                            <textarea id="commentReplyTextarea" name="commentReplyTextarea" class="form-control"
                                      rows="1" placeholder="Reply" required></textarea>
                            <div class="comment-reply-button-box">
                                <a class="comment-reply-submit" href="#"><i class="fas fa-check-circle"></i></a>
                                <a data-parent-id="" class="comment-reply-cancel" href="#"><i class="fas fa-times-circle"></i></a>
                            </div>
                        </div>
                    </form>
                </div>

                @if(isset(auth()->user()->id) && auth()->user()->id == $comment->user->id)
                    <div class="edit-comment-form-container mt-5">
                        <form id="editCommentForm" method="post"
                              action="{{route('update-comment', ['post' => $post->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="comment_id" name="comment_id"
                                   value="">
                            <div class="form-group">
                            <textarea style="font-size: .90rem" id="editCommentTextarea" name="editCommentTextarea" class="form-control"
                                      rows="5" required></textarea>
                                <div class="edit-comment-button-box">
                                    <a class="edit-comment-submit" href="#"><i class="fas fa-check-circle"></i></a>
                                    <a data-comment-id="" class="edit-comment-cancel" href="#"><i class="fas fa-times-circle"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            @endif

        @section('scripts')
            <script src="{{ asset('js/article.js') }}"></script>
        @endsection('scripts')
        @endif
    </div>

</article><!--article-->
