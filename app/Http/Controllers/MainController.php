<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\Follow;
use App\Models\Bookmark;
use App\Models\Community;
use App\Models\LikesPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    $userId = Auth::id();

    // Ambil komunitas yang diikuti oleh pengguna dan yang aktif
    $myCommunityIds = Community::whereHas('members', function($query) use ($userId) {
        $query->where('user_id', $userId);
    })->where('is_active', 1)->pluck('id');

    // Ambil postingan dari komunitas yang diikuti oleh pengguna
    $postsFromMyCommunities = Post::whereIn('community_id', $myCommunityIds)
                                ->orWhereNull('community_id')
                                ->orderBy('created_at', 'desc')
                                ->get();

    foreach ($postsFromMyCommunities as $post) {
        $post->liked = $post->likes()->where('user_id', $userId)->exists();
        $post->bookmarked = $post->bookmarks()->where('user_id', $userId)->exists();
    }

    $this->data['allPosts'] = $postsFromMyCommunities;
    $this->data['allMyCommunities'] = Community::whereIn('id', $myCommunityIds)->where('is_active', 1)->get();
    $this->data['allMyEvents'] = Auth::user()->joinedEvents;

    return view('main.home', $this->data);
}






    public function setViewProfile()
    {
        $this->data['title'] = 'Profile';
        $this->data['admins'] = User::where('role', 1)->get();
        $userId = Auth::id();
    
        $myposts = Post::where('creator_id', $this->data['id'])->get();
        foreach ($myposts as $post) {
            $post->liked = $post->likes()->where('user_id', $userId)->exists();
            $post->bookmarked = $post->bookmarks()->where('user_id', $userId)->exists();
        }
    
        $likeposts = LikesPost::with(['user', 'post'])->where('user_id', $userId)->get();
        foreach ($likeposts as $likepost) {
            $likepost->post->liked = $likepost->post->likes()->where('user_id', $userId)->exists();
            $likepost->post->bookmarked = $likepost->post->bookmarks()->where('user_id', $userId)->exists();
        }
    
        $saveposts = Bookmark::with(['user', 'post'])->where('user_id', $userId)->get();
        foreach ($saveposts as $savepost) {
            $savepost->post->liked = $savepost->post->likes()->where('user_id', $userId)->exists();
            $savepost->post->bookmarked = $savepost->post->bookmarks()->where('user_id', $userId)->exists();
        }

        $myCommunityIds = Community::whereHas('members', function($query) use ($userId) {$query->where('user_id', $userId);})->where('is_active', 1)->pluck('id');

        $this->data['allMyCommunities'] = Community::whereIn('id', $myCommunityIds)->where('is_active', 1)->get();
    
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
        $userId = Auth::id();

        $this->data['commBusiness'] = Community::where([['category', 'Business'],['is_active', '=', 1]])->get();
        $this->data['commFinances'] = Community::where([['category', 'Finance'],['is_active', '=', 1]])->get();
        $this->data['commPersonals'] = Community::where([['category', 'Personal Development'],['is_active', '=', 1]])->get();
        $myCommunityIds = Community::whereHas('members', function($query) use ($userId) {$query->where('user_id', $userId);})->where('is_active', 1)->pluck('id');

        $this->data['allMyCommunities'] = Community::whereIn('id', $myCommunityIds)->where('is_active', 1)->get();
        
        return view('main.community',$this->data);
    }
    
    public function setViewEvent()
    {
        $this->data['title'] = 'Event';
        $this->data['admins'] = User::where('role', 1)->get();

        $this->data['eventBusiness'] = Event::where([['category', 'Business'],['is_active', '=', 1]])->get();
        $this->data['eventFinances'] = Event::where([['category', 'Finance'],['is_active', '=', 1]])->get();
        $this->data['eventPersonals'] = Event::where([['category', 'Personal Development'],['is_active', '=', 1]])->get();
        
        
        return view('main.event',$this->data);
    }
    
    public function setViewHomeEvent()
    {
        $this->data['title'] = 'Home Event';
        $this->data['admins'] = User::where('role', 1)->get();

        $this->data['eventBusiness'] = Event::where([['category', 'Business'],['is_active', '=', 1]])->get();
        $this->data['eventFinances'] = Event::where([['category', 'Finance'],['is_active', '=', 1]])->get();
        $this->data['eventPersonals'] = Event::where([['category', 'Personal Development'],['is_active', '=', 1]])->get();

        $this->data['mainEvent'] = Event::where('is_active', 1)->orderBy('created_at', 'asc')->first();
        $this->data['threeEvent'] = Event::where('is_active', 1)->orderBy('created_at', 'asc')->take(3)->get();

        return view('main.homeevent',$this->data);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

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

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            
            // Generate nama file yang unik untuk menghindari overwrite
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Simpan file ke direktori 'storage/app/public/avatar'
            $filePath = $file->storeAs('public/avatar', $fileName);
            
            // Buat URL untuk diakses dari web
            $avatarUrl = Storage::url($filePath);
            $user->avatar = $avatarUrl;
        }
        

        // Simpan perubahan
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
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

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully!');
    }

    public function setViewProfileByUsername($username)
{
    $currentUser = Auth::user();

    if ($username === $currentUser->username) {
        return redirect()->route('profile');
    }

    $user = User::where('username', $username)->where('is_active', 1)->firstOrFail();
    $userId = $currentUser->id;

    $this->data['userNow'] = $user;
    $this->data['title'] = 'Profile of ' . $user->name;
    $this->data['admins'] = User::where('role', 1)->get();

    $myposts = Post::where('creator_id', $user->id)->get();
    foreach ($myposts as $post) {
        $post->liked = $post->likes()->where('user_id', $userId)->exists();
        $post->bookmarked = $post->bookmarks()->where('user_id', $userId)->exists();
    }

    $likeposts = LikesPost::with(['user', 'post'])->where('user_id', $user->id)->get();
    foreach ($likeposts as $likepost) {
        if ($likepost->post) {
            $likepost->post->liked = $likepost->post->likes()->where('user_id', $userId)->exists();
            $likepost->post->bookmarked = $likepost->post->bookmarks()->where('user_id', $userId)->exists();
        }
    }

    $saveposts = Bookmark::with(['user', 'post'])->where('user_id', $user->id)->get();
    foreach ($saveposts as $savepost) {
        if ($savepost->post) {
            $savepost->post->liked = $savepost->post->likes()->where('user_id', $userId)->exists();
            $savepost->post->bookmarked = $savepost->post->bookmarks()->where('user_id', $userId)->exists();
        }
    }

    $joinedCommunities = Community::whereHas('members', function($query) use ($user) {$query->where('user_id', $user->id);})->where('is_active', 1)->get();

    $this->data['myposts'] = $myposts;
    $this->data['likeposts'] = $likeposts;
    $this->data['saveposts'] = $saveposts;
    $this->data['joinedCommunities'] = $joinedCommunities;

    return view('main.profile_username', $this->data);
}


    public function follow(User $user)
    {
        $follower = Auth::user();

        if (!$follower->isFollowing($user->id)) {
            Follow::create([
                'follower_id' => $follower->id,
                'followed_id' => $user->id,
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function unfollow(User $user)
    {
        $follower = Auth::user();

        if ($follower->isFollowing($user->id)) {
            Follow::where('follower_id', $follower->id)->where('followed_id', $user->id)->delete();
        }

        return response()->json(['success' => true]);
    }



    
}
