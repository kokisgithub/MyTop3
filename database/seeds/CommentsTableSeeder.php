<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'body'             => 'ゴッドファーザーは名作',
                'post_id'          => 1,
                'user_id'          => 5,
                'created_at'       => date('Y-m-d H:i:0'),
                'updated_at'       => date('Y-m-d H:i:0'),
            ],
            [
                'body'             => '絞るの難しい。。',
                'post_id'          => 1,
                'user_id'          => 2,
                'created_at'       => date('Y-m-d H:i:1'),
                'updated_at'       => date('Y-m-d H:i:1'),
            ],
            [
                'body'             => "Don’t Let Me Downもおすすめです！",
                'post_id'          => 2,
                'user_id'          => 2,
                'created_at'       => date('Y-m-d H:i:2'),
                'updated_at'       => date('Y-m-d H:i:2'),
            ],
            [
                'body'             => '今度聴いてみます！',
                'post_id'          => 2,
                'user_id'          => 3,
                'created_at'       => date('Y-m-d H:i:3'),
                'updated_at'       => date('Y-m-d H:i:3'),
            ],
            [
                'body'             => 'ジョージさん、イタリアのどこに行きたいですか？',
                'post_id'          => 3,
                'user_id'          => 3,
                'created_at'       => date('Y-m-d H:i:4'),
                'updated_at'       => date('Y-m-d H:i:4'),
            ],
            [
                'body'             => 'ヴェネツィアですかね～',
                'post_id'          => 3,
                'user_id'          => 4,
                'created_at'       => date('Y-m-d H:i:5'),
                'updated_at'       => date('Y-m-d H:i:5'),
            ],
            [
                'body'             => '寿司！！！！！',
                'post_id'          => 4,
                'user_id'          => 4,
                'created_at'       => date('Y-m-d H:i:6'),
                'updated_at'       => date('Y-m-d H:i:6'),
            ],
            [
                'body'             => '寿司！！！！！',
                'post_id'          => 4,
                'user_id'          => 5,
                'created_at'       => date('Y-m-d H:i:7'),
                'updated_at'       => date('Y-m-d H:i:7'),
            ],
            [
                'body'             => '黒は鉄板',
                'post_id'          => 5,
                'user_id'          => 2,
                'created_at'       => date('Y-m-d H:i:8'),
                'updated_at'       => date('Y-m-d H:i:8'),
            ],
            [
                'body'             => '赤も好き',
                'post_id'          => 5,
                'user_id'          => 4,
                'created_at'       => date('Y-m-d H:i:9'),
                'updated_at'       => date('Y-m-d H:i:9'),
            ],
            [
                'body'             => '消去法で選びました',
                'post_id'          => 6,
                'user_id'          => 2,
                'created_at'       => date('Y-m-d H:i:10'),
                'updated_at'       => date('Y-m-d H:i:10'),
            ],
            [
                'body'             => '夏が一番',
                'post_id'          => 6,
                'user_id'          => 5,
                'created_at'       => date('Y-m-d H:i:11'),
                'updated_at'       => date('Y-m-d H:i:11'),
            ],
        ]);
    }
}