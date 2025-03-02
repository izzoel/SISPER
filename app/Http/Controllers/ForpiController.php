<?php

namespace App\Http\Controllers;

use App\Models\Forpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForpiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd(Auth::check(), Auth::guard('mahasiswa')->check(), Auth::user(), Auth::guard('mahasiswa')->user());
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
            'menuData' => $request->get('menuData')
        ];
        if (Auth::check() || Auth::guard('mahasiswa')->check()) {
            return view('layout.template', compact('data'));
        } else {
            return view('guest.landing');
        }
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
    public function show(Forpi $forpi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forpi $forpi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forpi $forpi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forpi $forpi)
    {
        //
    }
}
