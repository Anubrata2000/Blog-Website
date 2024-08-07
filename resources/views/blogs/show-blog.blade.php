<x-app-layout>
    <h1 class="text-center mb-4">{{ $blog->title }}</h1>

    <div class="card">
        @if ($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="Blog Image"
                style="max-height: 400px; object-fit: cover;">
        @endif
        <div class="card-body">
            <p class="card-text">{{ $blog->content }}</p>
        </div>
        <div class="card-footer text-muted">
            <small>Posted by {{ $blog->user ? $blog->user->name : 'Unknown' }} on
                {{ $blog->created_at->format('d M Y') }}</small>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-primary">Back to All Blogs</a>
    </div>
</x-app-layout>
