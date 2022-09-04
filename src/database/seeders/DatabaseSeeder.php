<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MstPrefectureSeeder;
use Database\Seeders\RadioSeeder as SeedersRadioSeeder;
use Databese\Seeders\RadioSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     *
     * @return void
     */
    private const SEEDERS = [
        MstPrefectureSeeder::class,
    ];

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            MstPrefectureSeeder::class,
            SeedersRadioSeeder::class
        ]);
    }
}
