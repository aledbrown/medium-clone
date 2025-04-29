<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;

class FollowerController extends Controller
{
    public function followUnfollow(User $user)
    {
        $user->followers()->toggle(auth()->user());

        $followerCount = $user->followers()->count();

        return response()->json([
            'followersCount' => $followerCount,
            'followersText' => Str::plural($value = 'follower', $followerCount),
        ]);
    }
}
