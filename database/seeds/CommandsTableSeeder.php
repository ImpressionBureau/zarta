<?php

use App\Models\Command;
use Illuminate\Database\Seeder;

class CommandsTableSeeder extends Seeder
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
            $command = Command::create([
                'slug' => $faker->slug,
            ]);

            $command->addMediaFromUrl($faker->imageUrl(1920, 900))
                ->toMediaCollection('command');

            foreach (config('app.locales') as $locale) {
                $command->translates()->create([
                    'lang' => $locale,
                    'title' => ucfirst($faker->name),
                    'content' => [
                        'body' => 'Должность'
                    ]
                ]);
            }
        }
    }
}
