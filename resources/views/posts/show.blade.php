@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="page-header">
                <h1>{{ $post->title }}</h1>
                <h4 class="author-line text-muted"><i><b>Author:</b></i> {{ $post->blog->owner->name }} - <i><b>Published: </b></i> {{ date('d-m-Y', $post->publishedAt) }}
                </h4>
            </div>
            <div class="col-xs-12 post-body">
                {!! $post->body !!}
            </div>
        </div>
        <div class="row">
            <div class="page-header">
                <h3>Comments</h3>
            </div>
            <div class="col-xs-12 post-body">
                @forelse($post->comments as $comment)
                    <div class="">
                        {{ $comment->content }}
                    </div>
                    <div class="" style="text-align:right;">
                        <span></span><i>-- {{ $comment->user->name }}
                            - {{ $comment->created_at }}</i>
                    </div>
                    <br/>
                @empty
                    <p>This post has no comments</p>
                @endforelse
            </div>
            <div class="">
                <h4>Leave a Comment
                    <span class="text-danger">
                        @if ($user === 0)
                            ( You must login to leave a comment )
                        @endif
                    </span>
                </h4>

                <form class="form-horizontal" role="form" method="POST"
                      action="{{ route('comment_store', ['blog' => $post->blog->id, 'post' => $post->id]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ $user }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">

                        <div class="col-md-9">
                            <textarea id="content" class="form-control" name="content"
                                      rows="12">{{ old('content') }}</textarea>

                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-3">
                            <button type="submit"
                                    @if ($user === 0) disabled @endif
                                    class="btn btn-primary @if ($user === 0) disabled @endif">
                                <i class="fa fa-btn"></i> Publish Comment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
