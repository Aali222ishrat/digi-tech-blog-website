<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
    'title' => 'Welcome to My Site',
    'description' => 'This is a dynamic slider description loaded from DB.',
    'image' => 'slide1.jpg',
    'button_text' => 'Read More',
    'button_url' => '/about',
    'status' => 1
]);
    }
}
