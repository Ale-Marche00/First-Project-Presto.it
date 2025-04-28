<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    private $accepted_values = [ 
        0=> 0, 
        1=>1, 
        2=>null
        ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->text(8),
            'description'=>fake()->text(250),
            'price'=>fake()->numberBetween(100,1000),
            'user_id'=>'1',
            'category_id'=>fake()->numberBetween(1,10),
            'is_accepted'=>$this->accepted_values[fake()->numberBetween(0,2)],
        ];
    }
}

