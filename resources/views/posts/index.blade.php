@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    @if ($post->image)
                        <img src="{{ my_asset($post->image) }}" class="img-fluid" width="100px">
                    @endif
                    <p class="text-muted">Posted by {{ $post->user->name }} on {{ $post->created_at->format('d M Y') }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
