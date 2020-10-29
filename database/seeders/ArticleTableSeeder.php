<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        foreach(range(1,50) as $index){
         
            DB::table('articles')->insert([
                'title'=>$faker->sentence(5),
                'body'=>$faker->paragraph(4)
            ]);
        }
      
    }
}
