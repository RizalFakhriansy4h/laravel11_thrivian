<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Set creator_id to be the same for all events
        // $creator = User::inRandomOrder()->first();
        $creator = 1;

        $events = [
            [
                'name' => 'Business Conference 2024',
                'description' => 'An annual conference focusing on business trends and strategies.',
                'category' => 'Business',
                'thumbnail' => '/storage/thumbnail_event/event1.jpg',
                'location' => 'New York, NY',
                'start_date' => '2024-07-10 09:00:00',
                'end_date' => '2024-07-12 17:00:00',
                'website' => 'https://business-conference.example.com',
                'is_active' => true,
                'price' => 199.99
            ],
            [
                'name' => 'Finance Workshop',
                'description' => 'A workshop on personal finance management and investment strategies.',
                'category' => 'Finance',
                'thumbnail' => '/storage/thumbnail_event/event2.jpg',
                'location' => 'San Francisco, CA',
                'start_date' => '2024-08-05 10:00:00',
                'end_date' => '2024-08-05 15:00:00',
                'website' => 'https://finance-workshop.example.com',
                'is_active' => true,
                'price' => 99.99
            ],
            [
                'name' => 'Personal Development Summit',
                'description' => 'A summit dedicated to personal growth and self-improvement.',
                'category' => 'Personal Development',
                'thumbnail' => '/storage/thumbnail_event/event3.jpg',
                'location' => 'Los Angeles, CA',
                'start_date' => '2024-09-15 09:00:00',
                'end_date' => '2024-09-17 17:00:00',
                'website' => 'https://personal-development-summit.example.com',
                'is_active' => true,
                'price' => 149.99
            ],
            [
                'name' => 'Tech Innovation Summit',
                'description' => 'A summit to discuss the latest innovations in technology.',
                'category' => 'Finance',
                'thumbnail' => '/storage/thumbnail_event/event4.jpg',
                'location' => 'Silicon Valley, CA',
                'start_date' => '2024-10-20 09:00:00',
                'end_date' => '2024-10-22 17:00:00',
                'website' => 'https://tech-innovation-summit.example.com',
                'is_active' => true,
                'price' => 299.99
            ]
            
        ];

        foreach ($events as $eventData) {
            $eventData['creator_id'] = $creator;
            $eventData['slug'] = Str::slug($eventData['name'], '-');
            
            // Create the event
            $event = Event::create($eventData);

            // Add creator to event_user table
            DB::table('event_user')->insert([
                'event_id' => $event->id,
                'user_id' => $creator,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
