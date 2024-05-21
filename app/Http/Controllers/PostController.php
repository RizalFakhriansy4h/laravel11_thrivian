<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Bookmark;
use App\Models\LikesPost;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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

    public function uploadPost(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $postData = new Post([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')), // Membuat slug dari title
            'content' => $request->input('content'),
            'category' => $request->input('category'),
            'creator_id' => Auth::id(), // Menggunakan ID dari user yang sedang login
            'is_published' => true, // Mengatur is_published ke true
        ]);

        if ($request->hasFile('thumbnail')) {
            $img = $request->file('thumbnail');
            
            // Pastikan direktori tujuan ada atau buat jika belum ada
            $destinationPath = public_path('storage/thumbnail_post'); // Lokasi penyimpanan di public
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true); // Membuat direktori jika tidak ada
            }
            
            // Generate nama file yang unik untuk menghindari overwrite
            $newName = uniqid() . '_' . $img->getClientOriginalName();
            
            // Pindahkan file ke direktori yang diinginkan
            $img->move($destinationPath, $newName);
            
            // Buat URL untuk diakses dari web
            $thumbnailUrl = "/storage/thumbnail_post/$newName";
            $postData->thumbnail = $thumbnailUrl;
        }     
        

        $postData->save();

        return redirect()->back()->with('success', 'Post uploaded successfully!');

    }

    public function likePost(Request $request)
    {
        $postId = $request->input('post_id');
        $userId = auth()->id();
        
        // Cek apakah user sudah like post ini
        $like = LikesPost::where('user_id', $userId)->where('post_id', $postId)->first();

        if ($like) {
            // Jika sudah like, maka unlike
            $like->delete();
            $liked = false;
        } else {
            // Jika belum like, maka like
            LikesPost::create([
                'user_id' => $userId,
                'post_id' => $postId,
            ]);
            $liked = true;
        }

        // Mengembalikan respons berupa jumlah like dan status like
        $likeCount = Post::find($postId)->likes()->count();

        return response()->json([
            'liked' => $liked,
            'likeCount' => $likeCount
        ]);
    }

    public function bookmarkPost(Request $request)
    {
        $postId = $request->input('post_id');
        $userId = auth()->id();

        // Cek apakah user sudah bookmark post ini
        $bookmark = Bookmark::where('user_id', $userId)->where('post_id', $postId)->first();

        if ($bookmark) {
            // Jika sudah bookmark, maka unbookmark
            $bookmark->delete();
            $bookmarked = false;
        } else {
            // Jika belum bookmark, maka bookmark
            Bookmark::create([
                'user_id' => $userId,
                'post_id' => $postId,
            ]);
            $bookmarked = true;
        }

        // Mengembalikan respons berupa jumlah bookmark dan status bookmark
        $bookmarkCount = Post::find($postId)->bookmarks()->count();

        return response()->json([
            'bookmarked' => $bookmarked,
            'bookmarkCount' => $bookmarkCount
        ]);
    }

    
}
