<div class="card" style="min-height: 100%">
    <div class="card__header">
        <h4 class="h4__title">Categories</h4>
    </div>
    <div class="card__body">
        <ul class="list-unstyled categories">
            @foreach($categories as $category)
                <li>
                    <a href="{{route('post-category', $category->name)}}" class="lead-link">
                        {{$category->name}} ({{$category->posts->count()}})
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div><!--/col-->
