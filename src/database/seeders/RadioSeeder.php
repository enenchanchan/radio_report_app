<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RadioSeeder extends Seeder
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
                'radio_title' => '霜降り明星のオールナイトニッポン',
                'radio_date' => '金曜日',
                'start_time' => '01:00',
                'end_time' => '03:00',
                'broadcaster' => 'ニッポン放送',
                'radio_about' =>
                '霜降り明星のオールナイトニッポンです。
<コーナー>
■ 野党!
「ボケ」と「つっこみ」をワンセットにして送ってください。
 ※メールの件名は「野党」でお願いします。

■ ピリオド・チャンピオン
「TBSオールスター感謝祭」で前人未踏4度のピリオド・チャピオンに輝いた粗品が
様々な分野のチャンピオンを発表していきます。
※ メールの件名は「 チャンピオン 」でお願いします!

■ 霜降り交遊録
霜降り明星が、様々な芸能人・有名人とカラんでいる様子を送ってください。
※メールの件名は「交遊録」でお願いします。
※せいや・粗品が登場しない交遊録でもOKです。

■ 一行
ショートショートの名手・星新一の作品に出てきそうな、
前後の文章や内容が気になる「一行」を送ってください。
※メールの件名は「 一行 」でお願いします。

※2021/9/24の放送で新しいルールについて粗品から説明がありましたが、
 そういうことなので、よろしくお願いします。

全てのメールアドレスは ss@allnightnippon.com まで
 '
            ],
            [
                'radio_title' => 'マヂカルラブリーのオールナイトニッポン',
                'radio_date' => '木曜日',
                'start_time' => '03:00',
                'end_time' => '05:00',
                'broadcaster' => 'ニッポン放送',
                'radio_about' =>
                '2020年の賞レースを最もざわつかせたお笑いコンビ・マヂカルラブリーが、木曜のオールナイトニッポン0を担当します! “あれはラジオじゃない”って言われないように精いっぱい喋ってます。是非お聴きください!'
            ],
            [
                'radio_title' => '三四郎のオールナイトニッポン',
                'radio_date' => '金曜日',
                'start_time' => '03:00',
                'end_time' => '05:00',
                'broadcaster' => 'ニッポン放送',
                'radio_about' =>
                '大ブレイク中のお笑いコンビ三四郎が金曜の深夜に大はしゃぎ! おもしろナイトにカモン!カモン!! みんなでワイワイ騒ごうぜ!'
            ],
            [
                'radio_title' => 'アルコ&ピースDCGARAGE',
                'radio_date' => '火曜日',
                'start_time' => '00:00',
                'end_time' => '01:00',
                'broadcaster' => 'TBSラジオ',
                'radio_about' =>
                '
                TBSラジオの深夜の入口をバッと盛り上げる、お笑い芸人による『60分のトークバラエティ』!『THE MANZAI 2011 2012』ファイナリスト、『キングオブコント 2013』ファイナリストの アルコ&ピースがTBSラジオに!
                理解不能でシュール、けどクセになる茶番劇がリスナーに受けた彼らのラジオ。その礎となる2人の“コント力”を活かして番組を盛り上げます。
                '
            ],
            [
                'radio_title' => '沈黙の金曜日',
                'radio_date' => '金曜日',
                'start_time' => '21:00',
                'end_time' => '23:00',
                'broadcaster' => 'FMFUJI',
                'radio_about' =>
                'アルコ&ピース+弓木奈於(乃木坂46)。 カタい話は一切なし!
                4期生とアンダーを応援を公言、あ～ぃ!
                '
            ]


        ];
        DB::table('radios')->insert($param);
    }
}
