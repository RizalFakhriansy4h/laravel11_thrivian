<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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

    public function setViewTableCommunity()
    {
        $this->data['title'] = 'Admin';
        $this->data['title_table'] = 'Community';
        $this->data['admins'] = User::where('role', 1)->get();
        $this->data['communities'] = Community::all();
        
        return view('admin.community',$this->data);
    }
    
    public function setViewTableEvent()
    {
        $this->data['title'] = 'Admin';
        $this->data['title_table'] = 'Event';
        $this->data['admins'] = User::where('role', 1)->get();
        $this->data['events'] = Event::all();
        
        return view('admin.event',$this->data);
    }
    
    public function setViewTableUser()
    {
        $this->data['title'] = 'Admin';
        $this->data['title_table'] = 'User';
        $this->data['users'] = User::where('role', 0)->where('is_active', 1)->get();
        
        return view('admin.user',$this->data);
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->role = 1; // Set role to admin
        $user->save();

        return redirect()->route('tableUser')->with('success', 'User has been made admin.');
    }
}
