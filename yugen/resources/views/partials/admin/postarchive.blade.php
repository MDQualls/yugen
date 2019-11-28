
<form class="d-inline ml-1" action="{{route('archive-post', $post->id)}}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-archive"></i> Archive</button>
</form>
