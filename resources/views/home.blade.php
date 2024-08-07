<x-app-layout>
    {{-- <style>
        .background-image {
            background-image: url('{{ asset('storage/images/arnel-hasanovic-MNd-Rka1o0Q-unsplash.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            /* Ensure it covers the full viewport height */
        }
    </style> --}}
    <div class="background-image">
        <h1 class="text-center mb-4">All Blogs</h1>

        <!-- Show the "Add Blog" button if the user is authenticated -->
        @auth
            <div class="text-center mb-4">
                <a href="{{ route('blogs.create') }}" class="btn btn-success">Add Blog</a>
            </div>
        @endauth

        <!-- Filter Form -->
        <div class="container mb-4">
            <form id="filter-form" method="GET" action="{{ route('home') }}">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Search by Title"
                            value="{{ request('title') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <select name="author" class="form-control">
                            <option value="">Select Author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}"
                                    {{ request('author') == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="date" name="created_date" class="form-control"
                            value="{{ request('created_date') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <!-- Show all the blogs in a table format -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Author</th>
                        <th>Created At</th>
                        @auth
                            <th>Actions</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr id="blog-details-{{ $blog->id }}">
                            <td>{{ $blog->title }}</td>
                            <td>{{ Str::limit($blog->content, 100) }}</td>
                            <td>
                                @if ($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image"
                                        style="max-width: 60px; max-height: 100px; object-fit: cover;">
                                @endif
                            </td>
                            <td>{{ $blog->user->name ?? 'Unknown' }}</td>
                            <td>{{ $blog->created_at->format('d M Y') }}</td>
                            @auth
                                @if ($blog->user_id === auth()->id())
                                    <td>
                                        <span class="d-flex align-items-center">
                                            <!-- View Button -->
                                            <a href="{{ route('blogs.show', $blog->id) }}" class="text-success mr-2"
                                                title="View">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <!-- Edit Button -->
                                            <a href="{{ route('blogs.edit', $blog->id) }}" class="text-warning mr-2"
                                                title="Edit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <!-- Delete Button -->
                                            <button class="delete-blog" data-id="{{ $blog->id }}" type="submit"
                                                class="btn p-0" style="background: none; border: none; color: red;"
                                                title="Delete">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </span>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{ route('blogs.show', $blog->id) }}" class="text-success mr-2"
                                            title="View">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                    </td>
                                @endif
                            @endauth
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No blogs available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination Links -->
        <div class="text-center">
            {{ $blogs->appends(request()->query())->links() }}
        </div>
    </div>
</x-app-layout>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle the click event for delete buttons
        $(document).on('click', '.delete-blog', function(e) {
            e.preventDefault();

            // if (!confirm('Are you sure you want to delete this blog?')) {
            //     return;
            // }
            let blogId = $(this).data('id');
            console.log(blogId);
            let url = "{{ route('blogs.destroy', ':id') }}".replace(':id', blogId);
            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: url,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    console.log('Success:', response);
                    toastr.success('Blog deleted successfully');
                    // Remove the blog row from the table
                    $('#blog-details-' + blogId).remove();
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    toastr.error('An error occurred while deleting the blog');
                }
            });
        });
    });
</script>
