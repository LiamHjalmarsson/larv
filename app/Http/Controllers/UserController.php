<?php

namespace App\Http\Controllers;

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
        return view('user.index', ["users" => User::all()] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'avatar' => 'sometimes|image',
        ]);

        
        if ($data["avatar"] !== null) {
            $filename = $request["username"] . "-" . uniqid() . ".jpg";
    
            $imageData = Image::make($request->file("avatar"))->fit(120)->encode("jpg");
            Storage::put("public/avatars/" . $filename, $imageData); 
        }

        $data["avatar"] = $filename;
        User::create($data);

        auth()->login($data["username"]);

        return redirect("/")->with("success", "User created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', ["user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
