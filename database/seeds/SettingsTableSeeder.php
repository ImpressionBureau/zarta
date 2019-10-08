<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');
        $setting = \App\Models\Setting::create([
            'phone' => '+38 (096) 273 00 23',
            'phone_additional' => '+38 (044) 275 79 99',
            'email' => 'zartamail@gmail.com',
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/',
            'youtube' => 'https://www.youtube.com/',
            'latitude' => '30.510974',
            'longitude' => '50.449998'
        ]);
        $setting->addMediaFromUrl($faker->imageUrl(1920, 900))
            ->toMediaCollection('banner');
        foreach (config('app.locales') as $locale) {
            $setting->translates()->create([
                'lang' => $locale,
                'title' => ucfirst($faker->sentence),
                'content' => [
                    'address' => 'м. Київ, проспект Лобановського 4В',
                    'work_time'=> 'ПН-ПТ 09.00-18.00 СБ-НД вихідний',
                ]
            ]);
        }
    }
}
