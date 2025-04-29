<?php

namespace App\Http\Controllers;

use App\Models\Post;

class ClapController extends Controller
{
    public function clap(Post $post)
    {
        auth()->user()->claps()->toggle($post);

        return response()->json([
            'clapsCount' => $post->claps()->count(),
        ]);
    }
}
