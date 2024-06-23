<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Bookmark;
use App\Models\Community;
use App\Models\LikesPost;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function setViewPost()
    {
        $this->data['title'] = 'Add Post';
        $this->data['admins'] = User::where('role', 1)->get();

        return view('main.add_post', $this->data);
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
            
            // Generate nama file yang unik untuk menghindari overwrite
            $newName = uniqid() . '_' . $img->getClientOriginalName();
            
            // Simpan file ke direktori 'storage/app/public/thumbnail_post'
            $path = $img->storeAs('public/thumbnail_post', $newName);
            
            // Buat URL untuk diakses dari web
            $thumbnailUrl = Storage::url($path);
            $postData->thumbnail = $thumbnailUrl;
        }
        
        

        $postData->save();

        return redirect(route('home'))->with('success', 'Post uploaded successfully!');

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

    public function detail($slug)
    {
        $post = Post::where('slug', $slug)->with(['comments.user', 'user'])->firstOrFail();

        $userId = Auth::id();

        $myCommunityIds = Community::whereHas('members', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('is_active', 1)->pluck('id');

        $this->data['post'] = $post;
        $this->data['title'] = 'Post ' . $post->title;

        $this->data['allMyCommunities'] = Community::whereIn('id', $myCommunityIds)->where('is_active', 1)->get();
        $this->data['allMyEvents'] = Auth::user()->joinedEvents;

        return view('main.post_detail', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string|max:255',
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() !== $post->creator_id) {
            return redirect()->back()->with('error', 'You do not have permission to delete this post.');
        }

        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully.');
    }


    
}
