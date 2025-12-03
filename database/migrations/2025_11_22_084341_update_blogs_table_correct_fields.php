<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {

            // 1. Delete the wrong columns
            if (Schema::hasColumn('blogs', 'category')) {
                $table->dropColumn('category');
            }

            if (Schema::hasColumn('blogs', 'tags')) {
                $table->dropColumn('tags');
            }

            // 2. Add correct category_id
            if (!Schema::hasColumn('blogs', 'category_id')) {
                $table->unsignedBigInteger('category_id')->after('content');
                $table->foreign('category_id')
                    ->references('cat_id')
                    ->on('categories')
                    ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('category')->nullable();
            $table->string('tags')->nullable();
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            });
    }
};
