<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Community;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CommunitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Business Leaders',
            'Finance Gurus',
            'Personal Growth Enthusiasts',
            'Startup Founders',
            'Investment Experts'
        ];

        $categories = ['Business', 'Finance', 'Personal Development'];
        $thumbnails = [
            '/storage/thumbnail_community/comm1.jpg',
            '/storage/thumbnail_community/comm2.jpg',
            '/storage/thumbnail_community/comm3.jpg',
            '/storage/thumbnail_community/comm4.jpg',
            '/storage/thumbnail_community/comm5.jpg',
        ];

        foreach ($names as $index => $name) {
            $slug = Str::slug($name, '-');
            $creator = User::inRandomOrder()->first();

            // Create the community
            $community = Community::create([
                'name' => $name,
                'category' => $categories[array_rand($categories)],
                'description' => 'This is a community for ' . $name,
                'is_active' => true,
                'creator_id' => $creator->id,
                'thumbnail' => $thumbnails[$index],
                'slug' => $slug,
            ]);

            // Add creator to community_user table as admin
            DB::table('community_user')->insert([
                'community_id' => $community->id,
                'user_id' => $creator->id,
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Create 3 posts for each community
            for ($i = 1; $i <= 3; $i++) {
                Post::create([
                    'title' => 'Sample Post ' . $i . ' for ' . $name,
                    'category' => $community->category,
                    'slug' => Str::slug('Sample Post ' . $i . ' for ' . $name, '-'),
                    'creator_id' => $creator->id,
                    'community_id' => $community->id,
                    // 'thumbnail' => '/storage/thumbnail_post/post' . $i . '.jpg', // Assume you have these images
                    'content' => 'This is a sample content for post ' . $i . ' in ' . $name . ' community.',
                ]);
            }
        }
    }
}
