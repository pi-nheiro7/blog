<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'user_id' => 3,
            'title' => 'PHP: a linguagem da WEB',
            'content' => 'Amet nisi incididunt aliqua dolore laboris consequat ex.'
        ]);
    }
}
