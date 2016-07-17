@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-header">
                    <h1>
                        {{ $blog->name }}
                        <span class="pull-right">
                        <a id="create-post-link" href="{{ route('post_create', ['blog' => $blog->id]) }}">
                            <button class="btn btn-default">Create Post</button>
                        </a>
                        </span>
                    </h1>
                </div>

                <div class="row">
                    @foreach($blog->posts as $post)
                        <div>
                            <a href="{{ route('post_view', ['blog' => $blog->id, 'post' => $post->id]) }}">
                                <h4>{{ $post->title }}</h4></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
