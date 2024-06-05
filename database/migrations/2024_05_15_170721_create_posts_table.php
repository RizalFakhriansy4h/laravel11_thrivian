<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->nullable();
            $table->string('slug')->unique();
            $table->foreignId('creator_id')->constrained('users');
            $table->text('thumbnail')->nullable();
            $table->longText('content');
            $table->unsignedBigInteger('likes_count')->default(0);
            $table->unsignedBigInteger('comment_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
