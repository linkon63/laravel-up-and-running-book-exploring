<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Post', [
            'post' => Post::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get(),
            'status' => true,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->title);
        $user = Auth::user();
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $user->id,
        ]);
        return Inertia::render('Post', [
            'post' => Post::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get(),
            'status' => true,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request)
    {
        Post::where('id', $request->id)->update(['title' => $request->title, 'description' => $request->description]);
        return Inertia::render('Post', [
            'post' => Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get(),
            'status' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id', $id)->delete();
        return Inertia::render('Post', [
            'post' => Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get(),
            'status' => true,
        ]);
    }
}
