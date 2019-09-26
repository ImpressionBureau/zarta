<?php

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 20; $i++) {
            $review = Review::create([
                'slug' => $faker->slug,
            ]);

            $review->addMediaFromUrl($faker->imageUrl(1920, 900))
                ->toMediaCollection('review');

            foreach (config('app.locales') as $locale) {
                $review->translates()->create([
                    'lang' => $locale,
                    'title' => ucfirst($faker->name),
                    'content' => [
                        'body' => '<p>'.implode('</p><p>', $faker->sentences(rand(3, 10))).'</p>'
                    ],

                ]);
            }
        }
    }
}
