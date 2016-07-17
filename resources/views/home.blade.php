@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-header">
                    <h1>Latest Posts</h1>
                </div>

                <div class="">
                    @forelse($posts as $post)

                    @empty
                        <h3>There are no posts available</h3>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
