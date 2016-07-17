@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-responsive">
                    <tr>
                        <th class="col-xs-8"></th>
                        <th class="col-xs-4"></th>
                    </tr>
                    @foreach($blogs as $blog)
                        <tr>
                            <td><a href="{{ route('blog_view', ['blog' => $blog->id]) }}">{{ $blog->name }}</a></td>
                            <td class="text-right">
                                @if ($blog->owner->id == $user)
                                    <a href="{{ route('blog_edit', ['blog' => $blog->id]) }}">
                                        <button class="btn btn-default" type="button">Update</button>
                                    </a>
                                    <a href="{{ route('blog_destroy', ['blog' => $blog->id]) }}">
                                        <button class="btn btn-danger" type="button">Delete</button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
