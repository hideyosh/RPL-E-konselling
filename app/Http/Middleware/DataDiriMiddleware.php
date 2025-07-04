<?php

namespace App\Http\Middleware;

use App\Models\Siswa;
use App\Models\Guru;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DataDiriMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'siswa') {
                $siswa = Siswa::where('user_id', Auth::id())->first();
                if ($siswa->nama == null) {
                    return redirect()->route('siswa.datadiri.create')
                    ->with('warning', 'Kamu harus melengkapi data diri terlebih dahulu.');
                }
            } else if (Auth::user()->role === 'guru') {
                $guru = Guru::where('user_id', Auth::id())->first();
                if ($guru->nama == null) {
                    return redirect()->route('guru.datadiri.create')
                    ->with('warning', 'Kamu harus melengkapi data diri terlebih dahulu.');
                }
            }
        }
        return $next($request);
    }
}
