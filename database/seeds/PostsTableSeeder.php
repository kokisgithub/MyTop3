<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title'            => '好きな映画TOP3',
                'body'             => '①ゴッドファーザー
②コーヒーをめぐる冒険
③天井桟敷の人々',
                'user_id'          => 1,
                'created_at'       => date('Y-m-d H:i:0'),
                'updated_at'       => date('Y-m-d H:i:0'),
            ],
            [
                'title'            => '好きなビートルズの曲TOP3',
                'body'             => "1.Something
2.I'm Only Sleeping
3.Got To Get You Into My Life",
                'user_id'          => 2,
                'created_at'       => date('Y-m-d H:i:1'),
                'updated_at'       => date('Y-m-d H:i:1'),
            ],
            [
                'title'            => '行ってみたい国',
                'body'             => 'Ⅰ.イタリア
Ⅱ.フランス 
Ⅲ.イギリス',
                'user_id'          => 3,
                'created_at'       => date('Y-m-d H:i:2'),
                'updated_at'       => date('Y-m-d H:i:2'),
            ],
            [
                'title'            => '好きな寿司ネタ',
                'body'             => '壱 鯛
弐 ヒラマサ 
参 甘エビ',
                'user_id'          => 4,
                'created_at'       => date('Y-m-d H:i:3'),
                'updated_at'       => date('Y-m-d H:i:3'),
            ],
            [
                'title'            => '好きな色',
                'body'             => '1.紺
2.黒 
3.茶色',
                'user_id'          => 3,
                'created_at'       => date('Y-m-d H:i:4'),
                'updated_at'       => date('Y-m-d H:i:4'),
            ],
            [
                'title'            => '好きな季節',
                'body'             => '①秋
②春
③冬',
                'user_id'          => 1,
                'created_at'       => date('Y-m-d H:i:5'),
                'updated_at'       => date('Y-m-d H:i:5'),
            ],
        ]);
    }
}
