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
                'id'               => 1,
                'title'            => '好きな映画TOP3',
                'body'             => '①ゴッドファーザー
②コーヒーをめぐる冒険
③天井桟敷の人々',
                'user_id'          => 2,
                'created_at'       => date('Y-m-d H:i:0'),
                'updated_at'       => date('Y-m-d H:i:0'),
            ],
            [
                'id'               => 2,
                'title'            => '好きなビートルズの曲TOP3',
                'body'             => "1.Something
2.I'm Only Sleeping
3.Got To Get You Into My Life",
                'user_id'          => 3,
                'created_at'       => date('Y-m-d H:i:1'),
                'updated_at'       => date('Y-m-d H:i:1'),
            ],
            [
                'id'               => 3,
                'title'            => '行ってみたい国',
                'body'             => 'I.イタリア
II.フランス 
III.イギリス',
                'user_id'          => 4,
                'created_at'       => date('Y-m-d H:i:2'),
                'updated_at'       => date('Y-m-d H:i:2'),
            ],
            [
                'id'               => 4,
                'title'            => '好きな寿司ネタ',
                'body'             => '壱 鯛
弐 ヒラマサ 
参 甘エビ',
                'user_id'          => 5,
                'created_at'       => date('Y-m-d H:i:3'),
                'updated_at'       => date('Y-m-d H:i:3'),
            ],
            [
                'id'               => 5,
                'title'            => '好きな色',
                'body'             => '➌茶色
➋黒 
➊紺',
                'user_id'          => 4,
                'created_at'       => date('Y-m-d H:i:4'),
                'updated_at'       => date('Y-m-d H:i:4'),
            ],
            [
                'id'               => 6,
                'title'            => '好きな季節',
                'body'             => '・秋
・春
・冬',
                'user_id'          => 2,
                'created_at'       => date('Y-m-d H:i:5'),
                'updated_at'       => date('Y-m-d H:i:5'),
            ],
            [
                'id'               => 7,
                'title'            => '好きなバイクメーカー',
                'body'             => '3位 YAMAHA
2位 アプリリア
1位 KAWASAKI',
                'user_id'          => 3,
                'created_at'       => date('Y-m-d H:i:6'),
                'updated_at'       => date('Y-m-d H:i:6'),
            ],
            [
                'id'               => 8,
                'title'            => 'おにぎりの具決定戦',
                'body'             => '最早これ以外買わない
🍙明太子
🍙鯖
🍙昆布',
                'user_id'          => 5,
                'created_at'       => date('Y-m-d H:i:7'),
                'updated_at'       => date('Y-m-d H:i:7'),
            ],
        ]);
    }
}