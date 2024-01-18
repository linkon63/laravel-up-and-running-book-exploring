<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Inertia\Inertia;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Test', [
            'test' => Test::orderBy('created_at', 'desc')->get(),
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

        Test::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        return Inertia::render('Test', [
            'test' => Test::orderBy('created_at', 'desc')->get(),
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
        Test::where('id', $request->id)->update(['name' => $request->name, 'phone' => $request->phone]);
        return Inertia::render('Test', [
            'test' => Test::orderBy('created_at', 'desc')->get(),
            'status' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Test::where('id', $id)->delete();
        return Inertia::render('Test', [
            'test' => Test::orderBy('created_at', 'desc')->get(),
            'status' => true,
        ]);
    }
}
