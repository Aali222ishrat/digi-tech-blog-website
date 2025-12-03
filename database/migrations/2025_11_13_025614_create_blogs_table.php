<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('short_description')->nullable();

            $table->longText('content');

            $table->string('category');
            $table->string('tags')->nullable();   // comma separated tags

            $table->string('featured_image')->nullable();

            $table->date('publish_date')->nullable();

            $table->string('status')->default('Draft'); // Draft / Published

            $table->boolean('allow_comments')->default(true);

            $table->foreignId('author_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
