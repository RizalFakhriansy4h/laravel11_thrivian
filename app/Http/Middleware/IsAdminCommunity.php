<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminCommunity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Ambil ID komunitas dari route parameter
        $communityId = $request->route('community_id') ?? $request->route('slug');

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Cek apakah pengguna adalah admin dari komunitas ini
        $isAdmin = $user->communities()->where('community_id', $communityId)->wherePivot('role', 'admin')->exists();

        if (!$isAdmin) {
            return redirect()->back()->with('error', 'You do not have admin access to this community.');
        }

        return $next($request);
    }
}
