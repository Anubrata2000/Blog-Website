<x-app-layout>
    <h1 class="text-center mb-4">Create a New Blog</h1>
    <form enctype="multipart/form-data" id="create_blog_form">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ old('category') }}">
            @error('category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" id="submit_blog" class="btn btn-primary">Submit</button>
    </form>
</x-app-layout>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('submit', '#create_blog_form', function(e) {
            e.preventDefault();

            let url = "{{ route('blogs.store') }}";
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
                    toastr.success('Blog created successfully');
                    $('#create_blog_form')[0].reset();
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    toastr.error('An error occurred while creating the blog');
                }
            });
        });
    });
</script>
