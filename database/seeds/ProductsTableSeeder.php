<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $name = $faker->sentence;

        Product::create([
            'cat_id' => rand(1, 10),
            'subcat_id' => rand(1, 20),
            'brand_id' => rand(1, 10),
            'name' => $name,
            'slug' => slugify($name),
            'model' => $name,
            'buying_price' => rand(700, 900),
            'selling_price' => rand(920, 1200),
            'special_price' => rand(500, 600),
            'special_start' => $faker->date(),
            'special_end' => $faker->date(),
            'quantity' => rand(10, 20),
            'video_url' => '',
            'warranty' => 0,
            'warranty_duration' => '',
            'warranty_conditions' => '',
            'thumbnail' => '',
            'gallery' => '',
            'description' => $faker->sentence(),
            'long_description' => $faker->sentence(),
            'status' => $this->getRandomStatus(),
        ]);
    }

    public function getRandomStatus()
    {
        $statuses =  array('active', 'inactive');
        return $statuses[array_rand($statuses)];
    }
}
