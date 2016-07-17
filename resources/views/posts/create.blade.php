@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">New Post</div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('post_store', ['blog' => $blog_id]) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="owner_id" value="{{ $owner }}">
                            <input type="hidden" name="blog_id" value="{{ $blog_id }}">

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-3 control-label">Title</label>

                                <div class="col-md-9">
                                    <input id="title" type="text" class="form-control" name="title"
                                           value="{{ old('title') }}">

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label for="body" class="col-md-3 control-label">Content</label>

                                <div class="col-md-9">
                                    <textarea id="body" class="form-control" name="body"
                                              rows="12">{{ old('body') }}</textarea>

                                    @if ($errors->has('body'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-3 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn"></i> Publish Post
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
