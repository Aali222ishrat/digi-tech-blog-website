<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
        $now = now();
        Category::insert([
            ['name'=>'Web Development','slug'=>'web-development','description'=>'Frontend & backend','created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Artificial Intelligence','slug'=>'ai','description'=>'AI & ML','created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Cyber Security','slug'=>'cyber-security','description'=>'Security topics','created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Cloud Computing','slug'=>'cloud-computing','description'=>'AWS/GCP/Azure','created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Mobile Development','slug'=>'mobile-dev','description'=>'Android & iOS','created_at'=>$now,'updated_at'=>$now],
        ]);
    }
    }
}
