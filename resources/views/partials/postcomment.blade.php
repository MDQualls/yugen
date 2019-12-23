<div class="media mb40">
    <i class="d-flex mr-3 fa fa-user-circle-o fa-3x"></i>
    <div class="media-body">
        <h5 class="mt-0 font400 clearfix">
            <a href="#" class="float-right">Reply</a>
            {{$comment->user->name}}</h5>
        {{$comment->comment}}
    </div>
    @if($comment->replys->count())
        <!-- Place the replies here -->
    @endif
</div>
