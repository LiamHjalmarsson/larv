<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize("viewAny", User::class);

        return Inertia::render("User/Index", ["users" => User::all()]);
        // return view('user.index', ["users" => User::all(), "games" => Game::all()] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create", User::class);

        return Inertia('User/Create');
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("create", User::class);

        $data = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'avatar' => 'sometimes|image',
        ]);

        
        if ($request->has("avatar")) {
            $filename = $request["username"] . "-" . uniqid() . ".jpg";
    
            $imageData = Image::make($request->file("avatar"))->fit(120)->encode("jpg");
            Storage::put("public/avatars/" . $filename, $imageData); 
            $data["avatar"] = $filename;
        }

        $user = User::create($data);

        auth()->login($user);

        return Inertia::render("User/", ["user" => $user]);
        // return redirect("/")->with("success", "User created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $username)
    {
        $this->authorize('view', User::class);
        
        // Find the user by username
        $user = User::where('username', $username)->first();

        if (!$user) {
            // Handle the case when the user is not found (e.g., display a 404 page)
            abort(401);
        }

        // You can also check authorization here if needed
        // $this->authorize('view', $user);

        $currentlyFollowing = 0;

        if (auth()->check()) {
            $currentlyFollowing = Follow::where([
                ['user_id', auth()->user()->id],
                ['followeduser', $user->id]
            ])->count();
        }

        // Pass user data and other necessary data to the Inertia view
        return Inertia::render('User/Show', [
            'user' => $user,
            'currentlyFollowing' => $currentlyFollowing
        ]);
        // return view('user.show', ["user" => $user, "following" => $currentlyFollowing]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize("update", $user);

        return view('user.edit', ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize("update", $user);

        $request->validate([
            "name" => "sometimes",
            "username" => "sometimes",
            "email" => "sometimes",
            "avatar" => "sometimes",
            "country" => "sometimes",
            "city" => "sometimes"
        ]);

        $user->update([
            "name" => $request->input("name"),
            "username" => $request->input("username"),
            "email" => $request->input("email"),
            "country" => $request->input("country"),
            "city" => $request->input("city"),
        ]);
    
        
        if ($request->hasFile("avatar")) {

            $oldAvatar = $user->avatar;

            $filename = $request["username"] . "-" . uniqid() . ".jpg";
            $imageData = Image::make($request->file("avatar"))->fit(120)->encode("jpg");
    
            Storage::put("public/avatars/" . $filename, $imageData); 
            $data["avatar"] = $filename;

            $user->update(["avatar" => $filename ]);

            if ($oldAvatar != "/fallback-avatar.jpg") {
                // delete old avatar replacing the string from storage to public 
                Storage::delete(str_replace("/storage/", "public/", $oldAvatar));
            }
        }


        return back()->with("success", "user updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize("delete", $user);

        $user->delete();
        
        return redirect("/")->with("success", "User deleted successfully");
    }
}
