<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize("viewAny", User::class);

        return view('user.index', ["users" => User::all(), "games" => Game::all()] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create", User::class);

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

        return redirect("/")->with("success", "User created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $this->authorize("view", $user);
        return view('user.show', ["user" => $user]);
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
