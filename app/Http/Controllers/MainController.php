<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Post;
use App\Models\User;
use App\Models\Community;
use App\Models\LikesPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
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
            'gender' => $user->gender,
            'interest' => $user->interest,
            'phone_number' => $user->phone_number,
            'date_of_birth' => $user->date_of_birth,
            'location' => $user->location,
        ];
    }

    public function setViewHome()
    {
        $this->data['title'] = 'Home';
        $this->data['admins'] = User::where('role', 1)->get();

        // untuk menampilkan semua posts
        $posts = Post::orderBy('created_at', 'desc')->get();
        $userId = Auth::id();

        // Tambahkan atribut 'liked' dan 'bookmarked' untuk setiap post
        foreach ($posts as $post) {
            $post->liked = $post->likes()->where('user_id', $userId)->exists();
            $post->bookmarked = $post->bookmarks()->where('user_id', $userId)->exists();
        }

        $this->data['allPosts'] = $posts;
        $this->data['allMyCommunities'] = Community::where([['creator_id', '=', Auth::user()->id],['is_active', '=', 1]])->get();

        return view('main.home', $this->data);
    }




    public function setViewProfile()
    {
        $this->data['title'] = 'Profile';
        $this->data['admins'] = User::where('role', 1)->get();
        $userId = Auth::id();
    
        // Ambil post yang dibuat oleh pengguna
        $myposts = Post::where('creator_id', $this->data['id'])->get();
        foreach ($myposts as $post) {
            $post->liked = $post->likes()->where('user_id', $userId)->exists();
            $post->bookmarked = $post->bookmarks()->where('user_id', $userId)->exists();
        }
    
        // Ambil post yang di-like oleh pengguna
        $likeposts = LikesPost::with(['user', 'post'])->where('user_id', $userId)->get();
        foreach ($likeposts as $likepost) {
            $likepost->post->liked = $likepost->post->likes()->where('user_id', $userId)->exists();
            $likepost->post->bookmarked = $likepost->post->bookmarks()->where('user_id', $userId)->exists();
        }
    
        // Ambil post yang disimpan oleh pengguna
        $saveposts = Bookmark::with(['user', 'post'])->where('user_id', $userId)->get();
        foreach ($saveposts as $savepost) {
            $savepost->post->liked = $savepost->post->likes()->where('user_id', $userId)->exists();
            $savepost->post->bookmarked = $savepost->post->bookmarks()->where('user_id', $userId)->exists();
        }
    
        $this->data['myposts'] = $myposts;
        $this->data['likeposts'] = $likeposts;
        $this->data['saveposts'] = $saveposts;
    
        return view('main.profile', $this->data);
    }


    public function setViewSettings()
    {
        $this->data['title'] = 'Settings';
        $this->data['admins'] = User::where('role', 1)->get();
        
        return view('main.settings',$this->data);
    }
    
    public function setViewCommunity()
    {
        $this->data['title'] = 'Community';
        $this->data['admins'] = User::where('role', 1)->get();

        $this->data['commBusiness'] = Community::where([['category', 'Business'],['is_active', '=', 1]])->get();
        $this->data['commFinances'] = Community::where([['category', 'Finance'],['is_active', '=', 1]])->get();
        $this->data['commPersonals'] = Community::where([['category', 'Personal Development'],['is_active', '=', 1]])->get();
        
        
        return view('main.community',$this->data);
    }

    // public function updateProfile(Request $request)
    // {
    // $user = Auth::user();

    // // if ($request->hasFile('image') && $request->file('image')->isValid()) {
    // //     $userDir = 'uploads/profile/' . $user->id; // Lokasi direktori per user
    // //     $fileName = $request->file('image')->getClientOriginalName(); // Mendapatkan nama file asli

    // //     // Membuat direktori jika belum ada
    // //     Storage::disk('public')->makeDirectory($userDir);

    // //     // Menyimpan file ke direktori pengguna
    // //     $path = $request->file('image')->storeAs($userDir, $fileName, 'public');

    // //     // Update path di database
    // //     $user->profile_picture = $path;
    // // }

    // // Validasi data yang diterima
    // $validatedData = $request->validate([
    //     'name' => 'nullable|string|max:255',
    //     'bio' => 'nullable|string|max:1000',
    //     'username' => 'nullable|string|max:255|unique:users,username,',
    //     'interest' => 'nullable|string|max:255',
    //     'gender' => 'nullable|string|in:Male,Female,Other',
    //     'phone_number' => 'nullable|numeric',
    //     'date_of_birth' => 'nullable|date',
    //     'location' => 'nullable|string|max:100',
    // ]);

    // // Update fields if they exist in the request
    // if ($request->has('name')) {
    //     $user->name = $validatedData['name'];
    // }

    // if ($request->has('bio')) {
    //     $user->bio = $validatedData['bio'];
    // }

    // if ($request->has('username')) {
    //     $user->username = $validatedData['username'];
    // }

    // if ($request->has('interest')) {
    //     $user->interest = $validatedData['interest'];
    // }

    // if ($request->has('gender')) {
    //     $user->gender = $validatedData['gender'];
    // }

    // if ($request->has('phone_number')) {
    //     $user->phone_number = $validatedData['phone_number'];
    // }

    // if ($request->has('date_of_birth')) {
    //     $user->date_of_birth = $validatedData['date_of_birth'];
    // }
    
    // if ($request->has('location')) {
    //     $user->location = $validatedData['location'];
    // }

    // // Simpan perubahan
    // $user->save();

    // return redirect()->back()->with('success', 'Profile updated successfully!');
    
    // }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi data yang diterima
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'username' => 'nullable|string|max:255|unique:users,username,' . $user->id,
            'interest' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:Male,Female,Other',
            'phone_number' => 'nullable|numeric',
            'date_of_birth' => 'nullable|date',
            'location' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update fields if they exist in the request
        if ($request->has('name')) {
            $user->name = $validatedData['name'];
        }

        if ($request->has('bio')) {
            $user->bio = $validatedData['bio'];
        }

        if ($request->has('username')) {
            $user->username = $validatedData['username'];
        }

        if ($request->has('interest')) {
            $user->interest = $validatedData['interest'];
        }

        if ($request->has('gender')) {
            $user->gender = $validatedData['gender'];
        }

        if ($request->has('phone_number')) {
            $user->phone_number = $validatedData['phone_number'];
        }

        if ($request->has('date_of_birth')) {
            $user->date_of_birth = $validatedData['date_of_birth'];
        }

        if ($request->has('location')) {
            $user->location = $validatedData['location'];
        }

        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('storage/avatar');

            // Pindahkan file ke folder yang diinginkan
            $file->move($filePath, $fileName);

            // Update path di database
            $user->avatar = '/storage/avatar/' . $fileName;
        }

        // Simpan perubahan
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'current_password' => 'required',
            'new_password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        $user = Auth::user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully!');
    }


    
}
