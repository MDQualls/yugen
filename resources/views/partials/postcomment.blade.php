<hr>
<div class="media bottom-margin-rem2">
    <i class="d-flex mr-3"></i>
    <div class="media-body">
        <h4 class="h4__title clearfix">
            {{$comment->user->name}} Commented ...
            @if(isset(auth()->user()->id) && auth()->user()->id == $comment->user->id)
                <div class="edit-comment-link-box">
                    <a title="Edit your comment" data-comment-id="{{$comment->id}}" class="edit-comment-link" href="#">Edit</a>
                </div>
            @endif
        </h4>
        <div class="comment-box">
            {{$comment->comment}}
        </div>
        <div class="comment-reply-container bottom-margin-rem2">
            <a data-parent-id="{{$comment->id}}" class="text-info body-link" href="#">Reply</a>
        </div>
        @if($comment->replys->count())
            @foreach($comment->replys as $reply)
                <div class="left-margin-rem2 bottom-margin-rem2">
                    <div class="media-body">
                        <h5 class="clearfix">
                            {{$reply->user->name}} replied
                            @if(isset(auth()->user()->id) && auth()->user()->id == $reply->user->id)
                                <div class="edit-comment-link-box">
                                    <a title="Edit your comment" data-comment-id="{{$reply->id}}" class="edit-comment-link" href="#">Edit</a>
                                </div>
                            @endif
                        </h5>
                        <div class="comment-box">
                            {{$reply->comment}}
                        </div>
                        <div class="comment-reply-container my-1">
                            <span class="comment-reply-span">
                                <a data-parent-id="{{$comment->id}}" class="text-info body-link" href="#">Reply</a>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>
