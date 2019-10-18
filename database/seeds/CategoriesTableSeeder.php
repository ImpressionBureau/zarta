<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

        for ($i = 0; $i < 5; $i++) {
            $category = Category::create([
                'slug' => $faker->slug,
                'thread' => 'directions',
            ]);

            $category->addMediaFromUrl($faker->imageUrl(1920, 900))->toMediaCollection('category');

            foreach (config('app.locales') as $locale) {
                $category->translates()->create([
                    'lang' => $locale,
                    'title' => ucfirst($faker->sentence),
                    'content' => [
                        'description' => ucfirst($faker->sentence),
                    ]
                ]);
            }
        }
        for ($i = 0; $i < 5; $i++) {
            $category = Category::create([
                'slug' => $faker->slug,
                'thread' => 'methods',
            ]);

            $category->addMediaFromUrl($faker->imageUrl(1920, 900))->toMediaCollection('category');

            foreach (config('app.locales') as $locale) {
                $category->translates()->create([
                    'lang' => $locale,
                    'title' => ucfirst($faker->sentence),
                    'content' => [
                        'description' => ucfirst($faker->sentence),
                    ]
                ]);
            }
        }
    }
}
