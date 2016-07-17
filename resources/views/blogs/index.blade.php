@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Steller Blogs</div>
                    <div class="panel-body">
                        <table class="table table-responsive">
                            <tr>
                                <th class="col-xs-8"></th>
                                <th class="col-xs-4"></th>
                            </tr>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td><a href="{{ route('blog_view', [$blog->id]) }}">{{ $blog->name }}</a></td>
                                    <td class="text-right">
                                        <a href="{{ route('blog_edit', ['blog' => $blog->id]) }}">
                                            <button class="btn btn-default" type="button">Update</button>
                                        </a>
                                        <a href="{{ route('blog_destroy', ['blog' => $blog->id]) }}">
                                            <button class="btn btn-danger" type="button">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
