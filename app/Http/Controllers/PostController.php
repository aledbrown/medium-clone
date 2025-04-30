<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $query = Post::with(['user', 'media'])->withCount('claps')->latest();

        if ($user) {
            $ids = $user->following()->pluck('users.id'); // get ids of users you are following
            $ids->push($user->id); // add user's own posts
            $query->whereIn('user_id', $ids);
        }

        $posts = $query->simplePaginate(10);

        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    public function category(Category $category)
    {
        $posts = $category
            ->posts()->with(['user', 'media'])->withCount('claps')
            ->latest()
            ->simplePaginate(10);

        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    public function myPosts()
    {
        $user = auth()->user();

        $posts = $user->posts()->with(['user', 'media'])->withCount('claps')
            ->latest()
            ->simplePaginate(10);

        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($data['title']);

        // Original Image Saving
        // $image = $data['image'];
        // unset($data['image']);
        // $imagePath = $image->store('posts', 'public');
        // $data['image'] = $imagePath;

        $post = Post::create($data);

        // New Image Saving
        $post->addMediaFromRequest('image')->toMediaCollection();

        return redirect()->route('dashboard')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username, Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
