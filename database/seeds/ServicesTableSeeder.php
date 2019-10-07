<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
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
            $service = \App\Models\Service::create([
                'slug' => $faker->slug,
                'category_id' => rand(1, 10),
                'price' => rand(1, 1000),
            ]);
            foreach (config('app.locales') as $locale) {
                $service->translates()->create([
                    'lang' => $locale,
                    'title' => ucfirst($faker->sentence),
                ]);
            }
        }
    }
}
