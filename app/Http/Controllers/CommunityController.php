<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Community;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CommunityUser;
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

    public function setViewCommunity()
    {
        $this->data['title'] = 'Add Community';
        $this->data['admins'] = User::where('role', 1)->get();

        return view('main.add_community', $this->data);
    }

    public function detail($slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();

        $userId = Auth::id();

        // Cek apakah pengguna adalah admin dari komunitas ini
        $isAdmin = $community->members()->where('user_id', $userId)->wherePivot('role', 'admin')->exists();

        $this->data['community'] = $community;
        $this->data['title'] = 'Community ' . $community->name;
        $this->data['admins'] = User::where('role', 1)->get();

        $this->data['allMyCommunities'] = Community::whereHas('members', function($query) use ($userId) {$query->where('user_id', $userId);})->where('is_active', 1)->get();
        
        $this->data['allMyEvents'] = Auth::user()->joinedEvents;

        $this->data['members'] = $community->members;
        
        $this->data['isMember'] = $community->members->contains($userId);
        $this->data['isAdmin'] = $isAdmin;

        $this->data['memberCount'] = $community->members()->count();
        $this->data['posts'] = $community->posts()->orderBy('created_at', 'desc')->get();

        return view('main.community_detail', $this->data);
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
            
            $destinationPath = public_path('storage/thumbnail_community');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            
            $newName = uniqid() . '_' . $img->getClientOriginalName();
            
            $img->move($destinationPath, $newName);
            
            $thumbnailUrl = "/storage/thumbnail_community/$newName";
            $community->thumbnail = $thumbnailUrl;
        }



        $community->save();

        return redirect(route('home'))->with('success', 'Community created successfully! Wait Accepted by Admin');
    }

    public function acceptCommunity(Request $request)
    {
        $request->validate([
            'isActive' => 'required|boolean'
        ]);

        $communityId = $request->input('communityId');
        $community = Community::findOrFail($communityId);
        $community->is_active = $request->input('isActive');
        $community->save();

        // Tambahkan creator sebagai anggota pertama jika komunitas diaktifkan
        if ($request->input('isActive') == 1) {
            $creatorId = $community->user->id;
            $existingMember = CommunityUser::where('user_id', $creatorId)
                                            ->where('community_id', $communityId)
                                            ->first();

            if (!$existingMember) {
                CommunityUser::create([
                    'user_id' => $creatorId,
                    'community_id' => $communityId,
                    'role' => 'admin'
                ]);
            }
        }

        return redirect()->back()->with('success', 'Community status updated successfully!');
    }

    public function joinCommunity(Request $request)
    {
        $communityId = $request->input('community_id');
        $userId = Auth::id();

        CommunityUser::create([
            'community_id' => $communityId,
            'user_id' => $userId,
            'role' => 'user' // Default role can be 'user'
        ]);

        return response()->json(['status' => 'joined']);
    }

    public function leaveCommunity(Request $request)
    {
        $communityId = $request->input('community_id');
        $userId = Auth::id();

        CommunityUser::where('community_id', $communityId)->where('user_id', $userId)->delete();

        return response()->json(['status' => 'left']);
    }

    public function postToCommunity($slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();
        $this->data['title'] = 'Add Post to Community ' . $community->name;
        $this->data['community'] = $community;

        return view('main.add_post_community', $this->data);
    }


    public function addEventToCommunity($slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();

        $this->data['title'] = 'Add Event ' . $community->name;
        $this->data['community'] = $community;
        $this->data['admins'] = User::where('role', 1)->get();

        return view('main.add_event', $this->data);
    }

    public function storePostToCommunity(Request $request, $slug)
    {
        $community = Community::where('slug', $slug)->firstOrFail();

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $postData = new Post([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'content' => $request->input('content'),
            'community_id' => $community->id,
            'creator_id' => Auth::id(),
            'is_published' => true,
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

        return redirect()->route('community.detail', ['slug' => $slug])->with('success', 'Post created successfully!');
    }
}
