<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tags', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug')->unique();
        $table->timestamps();
    });

    // Pivot table for blog-tag relationship
    Schema::create('blog_tag', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('blog_id');
        $table->unsignedBigInteger('tag_id');

        $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
        $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
    });
}
};
