<div class="mb40">
    <h4 class="sidebar-title">Categories</h4>
    <ul class="list-unstyled categories">
        @foreach($categories as $category)
            <li><a href="{{route('post-category', $category->name)}}">{{$category->name}} ({{$category->posts->count()}})</a> </li>
        @endforeach
    </ul>
</div><!--/col-->
