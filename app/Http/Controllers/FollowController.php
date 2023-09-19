<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user)
    {
        if ($user->id == auth()->user()->id) {
            return back()->with("failure", "Can't follow yourself");
        }
    
        $followCheck = Follow::where([
            ["user_id", "=", auth()->user()->id], ["followeduser", "=", $user->id]
        ])->count();

        if ($followCheck) {
            return back()->with("failure", "Already following this user");
        }
    
        $newFollow = new Follow;
        
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followeduser = $user->id;
    
        $newFollow->save();
    
        return back()->with("success", "User successfully followed");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Follow::where([["user_id", "=", auth()->user()->id], ["followeduser", "=", $user->id]])->delete();
        return back()->with("success", "User successfully unfollowed");
    }
}
