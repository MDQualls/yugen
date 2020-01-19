<hr class="light">
<div class="media mb20">
    <i class="d-flex mr-3"></i>
    <div class="media-body">
        <h5 class="mt-0 font400 clearfix">
            {{$comment->user->name}}
            @if(isset(auth()->user()->id) && auth()->user()->id == $comment->user->id)
                <div class="edit-comment-link-box">
                    <a title="Edit your comment" data-comment-id="{{$comment->id}}" class="edit-comment-link" href="#">Edit</a>
                </div>
            @endif
        </h5>
        <div class="comment-box">
            {{$comment->comment}}
        </div>
        <div class="comment-reply-container my-1">
            <a data-parent-id="{{$comment->id}}" class="text-info" href="#">Reply</a>
        </div>
        @if($comment->replys->count())
            @foreach($comment->replys as $reply)
                <div class=" ml-4 mt-3">
                    <div class="media-body">
                        <h5 class="mt-0 font400 clearfix">
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
                                <a data-parent-id="{{$comment->id}}" class="text-info" href="#">Reply</a>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>
