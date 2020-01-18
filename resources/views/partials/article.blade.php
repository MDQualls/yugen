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
                        <input type="hidden" id="parent_comment_id" name="parent_comment_id" value="{{$comment->id}}">
                        <div class="form-group">
                            <textarea id="commentReplyTextarea" name="commentReplyTextarea" class="form-control"
                                      rows="1" placeholder="Reply" required></textarea>
                            <div class="comment-reply-button-box">
                                <a class="comment-reply-submit" href="#"><i class="fas fa-check-circle"></i></a>
                                <a class="comment-reply-cancel" href="#"><i class="fas fa-times-circle"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            @endif

        @section('scripts')
            <script>
                function toggleReplyForm(target)  {
                    let formContainer = $('.comment-reply-form-container');
                    let commentReplyContainer = $(target).closest('.comment-reply-container').html();
                    let commentReplyForm = formContainer.html();

                    $("#commentReplyForm #parent_comment_id").val($(target).attr('data-parent-id'));
                    $(target).closest('.comment-reply-container').html(commentReplyForm);
                    $(formContainer).html(commentReplyContainer);
                    $('#commentReplyTextarea').removeClass('required-error');
                }

                $(document).on('click', 'div.comment-reply-container a.text-info', function () {
                    toggleReplyForm(this);
                });

                $(document).on('click', 'div.comment-reply-button-box a.comment-reply-cancel', function () {
                    toggleReplyForm(this);
                });

                $(document).on('click', 'div.comment-reply-button-box a.comment-reply-submit', function () {
                    let textarea = $('#commentReplyTextarea');
                    const regex = RegExp('[a-zA-Z0-9]+');
                    if(textarea.val() === undefined || regex.test(textarea.val()) === false)  {
                        textarea.addClass('required-error');
                        return false;
                    }

                    $('#commentReplyForm').submit();
                });

            </script>
        @endsection('scripts')
        @endif
    </div>

</article><!--article-->
