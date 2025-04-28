<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories = [
        'elettronica',
        'abbigliamento',
        'salute e bellezza',
        'casa e giardinaggio',
        'giocattoli',
        'sport',
        'animali domestici',
        'libri e riviste',
        'accessori',
        'motori',
    ];

    protected $fillable = [
        'title', 'description', 'price', 'category_id', 'user_id', 'is_accepted'
    ];

    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }

        Article::factory(20)->create();
    }
}
