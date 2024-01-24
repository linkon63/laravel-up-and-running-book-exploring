<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $friendIds = Friend::where('user_id', '=', Auth::user()->id)->pluck('friend_id');
        $notFriends = User::whereNotIn('id', $friendIds)->get();
        $friends = User::WhereIn('id', $friendIds)->get();

        return Inertia::render('Friend', [
            'users' => $notFriends,
            'friends' => $friends,
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
        //

        // dd($request);
        Friend::create([
            'user_id' => Auth::user()->id,
            'friend_id' => $request->friend
        ]);

        $friendIds = Friend::where('user_id', '=', Auth::user()->id)->pluck('friend_id');
        $notFriends = User::whereNotIn('id', $friendIds)->get();
        $friends = User::WhereIn('id', $friendIds)->get();

        return Inertia::render('Friend', [
            'users' => $notFriends,
            'friends' => $friends,
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Friend::where('friend_id', $id)->where('user_id', Auth::user()->id)->delete();

        $friendIds = Friend::where('user_id', '=', Auth::user()->id)->pluck('friend_id');
        $notFriends = User::whereNotIn('id', $friendIds)->get();
        $friends = User::WhereIn('id', $friendIds)->get();

        return Inertia::render('Friend', [
            'users' => $notFriends,
            'friends' => $friends,
            'status' => true,
        ]);
    }
}
