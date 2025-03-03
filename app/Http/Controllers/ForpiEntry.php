<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class ForpiEntry extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)) . ' | ' . strtoupper(request()->segment(2)),
            'menuData' => $request->get('menuData')
        ];

        // $mahasiswas = Entry::all();
        return view('auth.forpi.pages.entry', compact('data'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(ForpiEntry $forpiEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ForpiEntry $forpiEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ForpiEntry $forpiEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ForpiEntry $forpiEntry)
    {
        //
    }
}
