<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MstPrefectureSeeder;
use Databese\Seeders\SeederUserSeeder;
use Databese\Seeders\SeederRadioSeeder;
use Database\Seeders\SeederFavoriteSeeder;
use Database\Seeders\SeederArticleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     *
     * @return void
     */


    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            MstPrefectureSeeder::class,
            UserSeeder::class,
            RadioSeeder::class,
            FavoriteSeeder::class,
            ArticleSeeder::class
        ]);
    }
}
