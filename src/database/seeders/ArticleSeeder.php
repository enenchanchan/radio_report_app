<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
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
                'radio_id' => '1',
                'radio_date' => '2022-09-30',
                'body' => 'オールスター感謝祭前日/第14回MVPレース結果発表/野党/一行/ポケひみ100万チャレンジ 「た」から「い」',
            ], [
                'user_id' => '2',
                'radio_id' => '2',
                'radio_date' => '2022-09-29',
                'body' => '番組イベントに向けて/グッズ販売決定/エール心のアメリカ終了/広島の最強喧嘩王'
            ],
            [
                'user_id' => '3',
                'radio_id' => '3',
                'radio_date' => '2022-09-30',
                'body' => '笑撃戦隊解散/番組に関わるコンビが皆解散している/次は四千頭身か'
            ],
            [
                'user_id' => '4',
                'radio_id' => '4',
                'radio_date' => '2022-09-27',
                'body' => '夢みたいな番組が福島で放送、直火ローストのコーナー'
            ],

            [
                'user_id' => '5',
                'radio_id' => '5',
                'radio_date' => '2022-09-30',
                'body' => 'さんま御殿出演決定、渡部篤郎モノマネ、ゲスト武藤彩未'
            ],
        ];


        DB::table('articles')->insert($param);
    }
}
