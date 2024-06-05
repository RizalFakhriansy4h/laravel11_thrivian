<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [
            'Starting a Business',
            'Business Growth Strategies',
            'Investment Strategies',
            'Financial Planning for Startups',
            'Advanced Business Management',
            'Personal Finance Tips',
            'Small Business Financing',
            'Business Taxation Basics',
            'Understanding Business Loans',
            'Managing Business Finances'
        ];

        $thumbnails = [
            '/storage/thumbnail_post/img1.jpg',
            '/storage/thumbnail_post/img2.jpg',
            '/storage/thumbnail_post/img3.jpg',
            '/storage/thumbnail_post/img4.jpg',
            '/storage/thumbnail_post/img5.jpg',
            '/storage/thumbnail_post/img6.jpg',
            '/storage/thumbnail_post/img7.jpg',
            '/storage/thumbnail_post/img8.jpg',
            '/storage/thumbnail_post/img9.jpg',
            '/storage/thumbnail_post/img10.jpg',
        ];

        $categories = ['Business', 'Finance'];

        foreach ($titles as $index => $title) {
            $slug = Str::slug($title, '-');
            Post::create([
                'title' => $title,
                'category' => $categories[$index % count($categories)],
                'slug' => $slug,
                'creator_id' => User::inRandomOrder()->first()->id,
                'thumbnail' => $thumbnails[$index],
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate rutrum congue. Nulla condimentum dolor a malesuada scelerisque. Pellentesque purus libero, suscipit vitae metus non, congue faucibus magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fringilla tincidunt diam ac congue. Ut eu urna vehicula, molestie nunc et, euismod sem. Aliquam at justo laoreet nisl venenatis viverra. Nam accumsan nulla a condimentum aliquam. Integer varius purus ligula, vel porttitor. ' . $title,
            ]);
        }
    }
}
