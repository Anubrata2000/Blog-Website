{{-- {{-- <x-app-layout>
    <h1 class="text-center mb-4">Edit Blog</h1>

    {{-- <!-- Flash Messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif --}}

{{-- <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control"
                value="{{ old('title', $blog->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control" rows="5" required>{{ old('content', $blog->content) }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control">
            @if ($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image"
                    style="max-width: 200px; margin-top: 10px;">
            @endif
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" id="edit_form_blog" class="btn btn-primary">Update Blog</button>
    </form>
</x-app-layout> --}}

{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle the form submission
        $(document).on('submit', '#edit_blog_form', function(e) {
            e.preventDefault();

            let url = $(this).attr('action'); // Get form action URL
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData(this);

            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    console.log('Success:', response);
                    toastr.success('Blog updated successfully');
                    // Optionally, redirect or update the view here
                    // setTimeout(function() {
                    //     window.location.href =
                    //         "{{ route('home') }}";
                    // }, 0);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    toastr.error('An error occurred while updating the blog');
                }
            });
        });
    });
</script> --}}

<x-app-layout>
    <h1 class="text-center mb-4">Edit Blog</h1>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" id="edit_form_blog" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control"
                value="{{ old('title', $blog->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control" rows="5" required>{{ old('content', $blog->content) }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control">
            @if ($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image"
                    style="max-width: 200px; margin-top: 10px;">
            @endif
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Blog</button>
    </form>
</x-app-layout>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle the form submission
        $(document).on('submit', '#edit_form_blog', function(e) {
            e.preventDefault();

            let url = $(this).attr('action'); // Get form action URL
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            let formData = new FormData(this);

            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    if (response.redirect) {
                        // Show success message using Toastr
                        toastr.success('Blog updated successfully');
                        // Redirect to the home page
                        setTimeout(function() {
                            window.location.href = response.redirect;
                        }, 500);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    toastr.error('An error occurred while updating the blog');
                }
            });
        });
    });
</script>
