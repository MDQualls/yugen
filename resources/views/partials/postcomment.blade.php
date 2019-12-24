<hr class="light">
<div class="media mb40">
    <i class="d-flex mr-3"></i>
    <div class="media-body">
        <h5 class="mt-0 font400 clearfix">
            <a href="#" onclick="replyToComment({{$comment->id}})" class="float-right">Reply</a>
            {{$comment->user->name}}</h5>
        {{$comment->comment}}

        @if($comment->replys->count())
            @foreach($comment->replys as $reply)
                <div class=" ml-4 mt-4">
                    <div class="media-body">
                        <h5 class="mt-0 font400 clearfix">
                            <a href="#" onclick="replyToComment({{$comment->id}})" class="float-right">Reply</a>
                            {{$reply->user->name}} replied ...</h5>
                        {{$reply->comment}}
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>
