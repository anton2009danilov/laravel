<?php

use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert([
            ['id' => 1, 'rss' => "https://aif.ru/rss/politics.php", 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'rss' => "https://aif.ru/rss/money.php", 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'rss' => "https://aif.ru/rss/society.php", 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'rss' => "https://aif.ru/rss/health.php", 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'rss' => "https://aif.ru/rss/culture.php", 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'rss' => "https://aif.ru/rss/sport.php", 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'rss' => "https://aif.ru/rss/realty.php", 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
