<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            [
                'user_id' => '1',
                'radio_id' => '1'
            ],
            [
                'user_id' => '1',
                'radio_id' => '2'
            ],
            [
                'user_id' => '1',
                'radio_id' => '3'
            ],
            [
                'user_id' => '2',
                'radio_id' => '5'
            ],
            [
                'user_id' => '3',
                'radio_id' => '3'
            ],
            [
                'user_id' => '4',
                'radio_id' => '1'
            ],
            [
                'user_id' => '4',
                'radio_id' => '5'
            ],
        ];

        DB::table('favorites')->insert($param);
    }
}
