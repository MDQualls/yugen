@extends('layouts.app')


@section('content')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=269779617426299&autoLogAppEvents=1"
            nonce="xuhvEwTq"></script>
    <div class="row">
        <div class="col-3-of-4">
            <article class="article__post">
                <h3 class='h3__title'>{{$title}}</h3>
                @if($post->header_image)
                    <div class="image-card bottom-margin-rem2">
                        <img src="{{$post->header_image}}" alt="" class="img--fluid">
                    </div>
                @endif
                <div class="article__post__container">
                    <div class="text-right">
                        <div class="fb-like"
                             data-href="{!! url()->current() !!}"
                             data-width="" data-layout="button"
                             data-action="like"
                             data-size="small"
                             data-share="true">
                        </div>
                    </div>
                    <ul class="article__post--meta list-inline">
                        <li class="list-inline__item">
                            <i class="fas fa-user-circle"></i> <a class="lead-link"
                                                                  href="{{route('post-author', $post->user->name)}}">{{$post->user->name}}</a>
                        </li>
                        <li class="list-inline__item">
                            <i class="fas fa-calendar-o"></i> {{Carbon\Carbon::parse($post->published_at)->format('m/d/Y')}}
                        </li>
                        <li class="list-inline__item">
                            <i class="fas fa-boxes"></i> <a class="lead-link"
                                                            href="{{route('post-category', $post->category->name)}}">{{$post->category->name}}</a>
                        </li>
                    </ul>

                    <div class="article__post__content">
                        {!! $post->post_content !!}
                    </div>

                    @if($post->tags->count() > 0)
                        <ul class="article__post--meta list-inline">
                            @foreach($post->tags as $tag)
                                <li class="list-inline__item">
                                    <i class="fas fa-tag"></i> <a class="lead-link"
                                                                  href="{{route('post-tag',$tag->name)}}">#{{$tag->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if($post->comments->count() > 0)
                        <hr>
                        <h4 class="h4__title">Comments</h4>
                        @foreach($post->comments->where('parent_comment_id','=', 0) as $comment)
                            @include('partials.postcomment', ['comment' => $comment])
                        @endforeach
                    @endif

                    <hr class="bottom-margin-rem2">

                    <h4 class="bottom-margin-rem2 text-uppercase font500">Post a comment</h4>

                    @include('partials.errors')

                    <form id="comment-form" method="post" action="{{route('post-comment', ['post' => $post->id])}}"
                          role="form">
                        @csrf
                        <div class="form__group">
                            <label class="form__label">Comment</label>
                            <textarea id="comment" name="comment" class="form__control" rows="3" placeholder="Comment"
                                      required></textarea>
                        </div>
                        <div class="clearfix">
                            <input type="hidden" id="parent_comment_id" name="parent_comment_id" value="">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>

                    @if($post->comments->count() > 0)
                        <div class="comment-reply-form-container top-margin-rem2">
                            <form id="commentReplyForm" method="post"
                                  action="{{route('post-reply', ['post' => $post->id])}}">
                                @csrf
                                <input type="hidden" id="parent_comment_id" name="parent_comment_id" value="">
                                <div class="form-group">
                                    <textarea id="commentReplyTextarea" name="commentReplyTextarea" class="form-control"
                                              rows="1" placeholder="Reply" required></textarea>
                                    <div class="comment-reply-button-box">
                                        <a class="comment-reply-submit" href="#"><i class="fas fa-check-circle"></i></a>
                                        <a data-parent-id="" class="comment-reply-cancel" href="#"><i
                                                class="fas fa-times-circle"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @if(isset(auth()->user()->id) && auth()->user()->id == $comment->user->id)
                            <div class="edit-comment-form-container top-margin-rem2">
                                <form id="editCommentForm" method="post"
                                      action="{{route('update-comment', ['post' => $post->id])}}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="comment_id" name="comment_id"
                                           value="">
                                    <div class="form-group">
                            <textarea id="editCommentTextarea" name="editCommentTextarea"
                                      class="form-control"
                                      rows="5" required></textarea>
                                        <div class="edit-comment-button-box">
                                            <a class="edit-comment-submit" href="#"><i class="fas fa-check-circle"></i></a>
                                            <a data-comment-id="" class="edit-comment-cancel" href="#"><i
                                                    class="fas fa-times-circle"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    @endif

                    @section('scripts')
                        <script src="{{ asset('js/article.js') }}"></script>
                    @endsection('scripts')
                </div>

            </article><!--article-->
        </div>
        <div class="col-1-of-4">
            <div class="post-categories">
                @include('partials.categories', ['categories', $categories])
            </div>
        </div>
    </div>

@endsection
