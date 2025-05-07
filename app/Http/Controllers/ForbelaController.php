<?php

namespace App\Http\Controllers;

use App\Models\ForpiSubmit as Submit;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForbelaController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)),
            'menuData' => $request->get('menuData')
        ];
        if (Auth::check()) {
            return view('layout.template', compact('data'));
        } elseif (Auth::guard('mahasiswa')->check()) {
            return redirect()->route('forbela_submit');
        } else {
            return view('guest.landing');
        }
    }

    public function dashboard(Request $request)
    {
        $isset_pisn = Mahasiswa::whereIn('nim', Submit::pluck('nim'))->count();
        $noset_pisn = Mahasiswa::whereNotIn('nim', Submit::pluck('nim'))->count();
        $latest_isset_forpi = Submit::latest()->first();
        $latest_noset_forpi = Mahasiswa::whereNotIn('nim', Submit::pluck('nim'))->latest()->first();

        $prodi_mahasiswa = Mahasiswa::where('periode_lulus', $request->get('menuData')['periode_lulus'])
            ->get()
            ->groupBy('prodi')
            ->mapWithKeys(fn($group, $prodi) => [
                str_replace(['Sarjana', 'Diploma Tiga'], ['S1', 'D3'], ucwords(strtolower($prodi))) => $group->count()
            ]);

        $data = [
            'title' => env('APP_NAME') . ' | ' . strtoupper(request()->segment(1)) . ' | ' . strtoupper(request()->segment(2)),
            'menuData' => $request->get('menuData'),
            'total_entry' => Submit::count() ?? 0,
            'total_mahasiswa' => Mahasiswa::count(),
            'total_mahasiswa_isset_pisn' => $isset_pisn,
            'total_mahasiswa_noset_pisn' => $noset_pisn,
            'update_isset_forpi' => $latest_isset_forpi ? $latest_isset_forpi->updated_at->format('d-m-Y H:i:s') : '-',
            'update_noset_forpi' => $latest_noset_forpi ? $latest_noset_forpi->updated_at->format('d-m-Y H:i:s') : '-',
            'prodi_mahasiswa' => $prodi_mahasiswa,
        ];

        $entries = Submit::all();
        return view('auth.forbela.pages.section', compact('data', 'entries'));
    }
}
