<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    protected $data;

    public function __construct()
    {
        $user = Auth::user();

        $this->data = [
            'id' => $user->id,
            'name' => $user->name,
            'username' => $user->username,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'bio' => $user->bio,
            'role' => $user->role,
            'created_at' => $user->created_at,
        ];
    }

    
    public function requestCommunity(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $community = new Community([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'creator_id' => $this->data['id'], 
            'slug' => $this->data['id'] . Str::slug($request->name)
        ]);

        if ($request->hasFile('thumbnail')) {
            $img = $request->file('thumbnail');
            
            // Pastikan direktori tujuan ada atau buat jika belum ada
            $destinationPath = public_path('storage/thumbnail_community'); // Lokasi penyimpanan di public
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true); // Membuat direktori jika tidak ada
            }
            
            // Generate nama file yang unik untuk menghindari overwrite
            $newName = uniqid() . '_' . $img->getClientOriginalName();
            
            // Pindahkan file ke direktori yang diinginkan
            $img->move($destinationPath, $newName);
            
            // Buat URL untuk diakses dari web
            $thumbnailUrl = "/storage/thumbnail_community/$newName";
            $community->thumbnail = $thumbnailUrl;
        } 



        $community->save();

        return redirect()->back()->with('success', 'Community created successfully! Wait Accept From Admin');
    }

    public function acceptCommunity(Request $request)
    {
        $request->validate([
            'isActive' => 'required|boolean'
        ]);

        $communityId = $request->input('communityId'); // You might need to pass communityId in your form
        $community = Community::findOrFail($communityId);
        $community->is_active = $request->input('isActive');
        $community->save();

        return redirect()->back()->with('success', 'Community status updated successfully!');
    }
}
