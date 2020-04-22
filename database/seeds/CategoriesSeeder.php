<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData() {
        $data = [
            "1" => [
                "id" => 1,
                "name" => "Горячие новости",
                "slug" => "hot"
            ],
            "2" => [
                "id" => 2,
                "name" => "Жуткие новости",
                "slug" => "horrible"
            ],
            "3" => [
                "id" => 3,
                "name" => "Добрые новости",
                "slug" => "good"
            ]
        ];

        return $data;
    }
}
