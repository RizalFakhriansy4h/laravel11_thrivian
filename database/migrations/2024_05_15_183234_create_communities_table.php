<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunitiesTable extends Migration
{
    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing integer ID
            $table->string('name');
            $table->enum('category', ['Business', 'Finance', 'Personal Development']);
            $table->text('description');
            $table->boolean('is_active')->default(false);
            $table->foreignId('creator_id')->constrained('users');
            $table->string('thumbnail');
            $table->string('advert_thumbnail');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('communities');
    }
}

