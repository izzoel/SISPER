<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->segment(1) == 'forpi') {
            $version = '3.0';
            $about = 'Formulir Pengajuan Surat Keterangan Pendamping Ijazah';
        } else {
            $version = '3.0';
            $about = 'Sistem Persuratan';
        }

        $menuData = [
            'menu' => strtoupper($request->segment(1)),
            'logo' => $request->segment(1),
            'version' => $version,
            'about' => $about,
        ];

        if (Auth::check() || Auth::guard('mahasiswa')->check()) {
            if (Auth::user() !== null) {
                $menuData['description'] = strtoupper(Auth::user()->name);
                $menuData['segment2'] = strtoupper($request->segment(2)) ?? '';
            } else {
                $menuData['description'] = 'Formulir Pengajuan Surat Keterangan Pendamping Ijazah';
            }
        }

        $request->merge(['menuData' => $menuData]);

        return $next($request);
    }
}
