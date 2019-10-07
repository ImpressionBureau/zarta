<?php

use App\Models\Method;
use Illuminate\Database\Seeder;

class MethodsTableSeeder extends Seeder
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
            $article = Method::create([
                'slug' => $faker->slug,
                'category_id' => rand(6, 10),
            ]);

            $article->addMediaFromUrl($faker->imageUrl(1920, 900))->toMediaCollection('method');

            foreach (config('app.locales') as $locale) {
                $article->translates()->create([
                    'lang' => $locale,
                    'title' => ucfirst($faker->sentence),
                    'content' => [
                        'body' => '<p>'.implode('</p><p>', $faker->sentences(rand(3, 10))).'</p>',
                        'navigation' => ucfirst($faker->sentence),
                    ]
                ]);
            }
        }
    }
}
