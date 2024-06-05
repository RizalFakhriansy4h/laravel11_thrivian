<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsMemberCommunity
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
        // Ambil ID atau slug komunitas dari route parameter
        $slug = $request->route('slug');
        
        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Cari komunitas berdasarkan slug
        $community = \App\Models\Community::where('slug', $slug)->first();

        if (!$community) {
            return redirect()->back()->with('error', 'Community not found.');
        }

        // Cek apakah pengguna adalah anggota dari komunitas ini
        $isMember = $community->members()->where('user_id', $user->id)->exists();

        if (!$isMember) {
            return redirect()->back()->with('error', 'You are not a member of this community.');
        }

        return $next($request);
    }
}
