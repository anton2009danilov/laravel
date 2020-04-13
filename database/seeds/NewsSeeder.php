<?php

use App\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('news')->insert($this->getData());
        factory(News::class, 10)->create();
    }

//    private function getData(): array
//    {
//        $faker = Faker\Factory::create('ru_RU');
//
//        $data = [];
//
//        for ($i = 0; $i < 10; $i++) {
//            $data[] = [
//                'title' => $faker->realText(rand(10,15)),
//                'text' => $faker->realText(rand(300,800)),
//                'category_id'=> random_int(1,3),
//                'isPrivate' => (bool)rand(0,1),
//            ];
//        }
//
//        return $data;
//    }
}
