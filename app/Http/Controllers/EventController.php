<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
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

    public function setViewEvent()
    {
        $this->data['title'] = 'Add Event';
        $this->data['admins'] = User::where('role', 1)->get();

        return view('main.add_event', $this->data);
    }

    public function detail($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        $isJoin = $event->members->contains(Auth::id());
        $isCreator = $event->creator_id === Auth::id();

        $this->data['event'] = $event;
        $this->data['title'] = 'Event ' . $event->name;
        $this->data['isJoin'] = $isJoin;
        $this->data['isCreator'] = $isCreator;
        $this->data['members'] = $event->members;

        return view('main.event_detail', $this->data);
    }


    public function requestEvent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'website' => 'nullable|url',
            'price' => 'nullable|numeric|min:0|max:999999',

        ]);

        $event = new Event();
        $event->name = $validatedData['name'];
        $event->description = $validatedData['description'];
        $event->category = $validatedData['category'];
        $event->location = $validatedData['location'];
        $event->start_date = $validatedData['start_date'];
        $event->end_date = $validatedData['end_date'];
        $event->website = $validatedData['website'];
        $event->price = $validatedData['price'];
        $event->creator_id = $this->data['id'];
        $event->slug = $this->data['id'] . Str::slug($request->name);

        if ($request->hasFile('thumbnail')) {
            $img = $request->file('thumbnail');
            
            $destinationPath = public_path('storage/thumbnail_event');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            
            $newName = uniqid() . '_' . $img->getClientOriginalName();
            
            $img->move($destinationPath, $newName);
            
            $thumbnailUrl = "/storage/thumbnail_Event/$newName";
            $event->thumbnail = $thumbnailUrl;
        }

        $event->save();

        return redirect(route('home'))->with('success', 'Event created successfully! Wait Accepted by Admin');
    }

    public function acceptevent(Request $request)
    {
        $request->validate([
            'isActive' => 'required|boolean'
        ]);

        $eventId = $request->input('eventId'); // You might need to pass eventId in your form
        $event = event::findOrFail($eventId);
        $event->is_active = $request->input('isActive');
        $event->save();

        return redirect()->back()->with('success', 'event status updated successfully!');
    }

    public function joinEvent(Request $request)
    {
        $eventId = $request->input('event_id');
        $userId = Auth::id();

        EventUser::create([
            'event_id' => $eventId,
            'user_id' => $userId,
        ]);

        return response()->json(['status' => 'joined']);
    }



}
