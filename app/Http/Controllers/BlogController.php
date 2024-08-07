<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    protected $blog;
    protected $user;

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->blog = new Blog();
        $this->user = new User();
    }


    public function index(Request $request)
    {
        $query = $this->blog->with('user')->latest();

        // Apply filters
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        if ($request->filled('author')) {
            $query->where('user_id', $request->input('author'));
        }

        if ($request->filled('created_date')) {
            $query->whereDate('created_at', $request->input('created_date'));
        }

        // Get the number of items per page
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided

        $blogs = $query->paginate($perPage);

        // Fetch authors for the dropdown
        $authors = $this->user->select('id', 'name')->get();

        return view('home', compact('blogs', 'authors'));
    }


    // Show form for creating a new blog
    public function create()
    {
        return view('blogs.create-blogs');
    }

    // Store a newly created blog in storage
    public function store(BlogRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id(); // Assign the logged-in user

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $created = $this->blog->create($validated);

        return $created;
    }

    // Display the specified blog
    public function show($id)
    {
        $blog = $this->blog->with('user')->findOrFail($id);
        return view('blogs.show-blog', compact('blog'));
    }


    // Show the form for editing the specified blog
    public function edit($id)
{
    $blog = $this->blog->with('user')->findOrFail($id);

    if ($blog->user_id !== auth()->id()) {
        return redirect()->route('blogs.index')->with('error', 'Unauthorized access.');
    }

    return view('blogs.edit-blog', compact('blog'));
}

    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized access.'], 403);
        }

        $validated = $request->validated();

        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $update = $blog->update($validated);

        if ($update) {
            // Set a session variable for Toastr notification
            session()->flash('success', 'Blog updated successfully.');
            return response()->json(['redirect' => route('home')]);
        }

        return response()->json(['error' => 'Failed to update blog.'], 500);
    }



    // Remove the specified blog from storage
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->user_id !== auth()->id()) {
            return redirect()->route('blogs.index')->with('error', 'Unauthorized access.');
        }

        $delete = $blog->delete();

        return $delete;
    }
}