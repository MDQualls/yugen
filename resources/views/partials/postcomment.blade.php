<hr class="light">
<div class="media mb20">
    <i class="d-flex mr-3"></i>
    <div class="media-body">
        <h5 class="mt-0 font400 clearfix">
            {{$comment->user->name}}
            @if(auth()->user()->id == $comment->user->id)
                <div class="update-comment-popover float-right mr-2">
                    <a href="#" data-container="body"
                       data-toggle="popover" data-placement="bottom"
                       data-content="<div><a href='#'>Edit</a></div><div><a href='#'>Delete</a></div>"
                       title="Update Comment" data-html="true">
                        <i class="fas fa-ellipsis-h"></i>
                    </a>
                </div>
            @endif
        </h5>
        {{$comment->comment}}
        <div class="my-1"><a class="text-info" href="#" onclick="replyToComment({{$comment->id}})">Reply</a></div>
        @if($comment->replys->count())
            @foreach($comment->replys as $reply)
                <div class=" ml-4 mt-3">
                    <div class="media-body">
                        <h5 class="mt-0 font400 clearfix">
                            {{$reply->user->name}} replied
                            @if(auth()->user()->id == $reply->user->id)
                                <div class="update-comment-popover float-right mr-2">
                                    <a href="#" data-container="body"
                                       data-toggle="popover" data-placement="bottom"
                                       data-content="<div><a href='#'>Edit</a></div><div><a href='#'>Delete</a></div>"
                                       title="Update Comment" data-html="true">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                </div>
                            @endif
                        </h5>
                        {{$reply->comment}}
                        <div class="my-1"><a class="text-info" href="#" onclick="replyToComment({{$comment->id}})">Reply</a></div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>
