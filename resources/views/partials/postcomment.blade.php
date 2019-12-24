<div class="media mb40">
    <i class="d-flex mr-3"></i>
    <div class="media-body">
        <h5 class="mt-0 font400 clearfix">
            <a href="#" onclick="replyToComment({{$comment->id}})" class="float-right">Reply</a>
            {{$comment->user->name}}</h5>
        {{$comment->comment}}

        @if($comment->replys->count())
            @foreach($comment->replys as $reply)
                <div class=" ml-3 mt-3 bg-faded">
                    <div class="p-1">
                        <div class="media-body">
                            <h5 class="mt-0 font400 clearfix">
                                {{$reply->user->name}} replied to {{$comment->user->name}}</h5>
                            {{$reply->comment}}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>
