<?php

use Illuminate\Database\Seeder;

class SymbolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('symbols')->insert([
            [
                'id'        => 1,
                'symbol'    => '① ② ③',
                'body'      => '①
②
③',
            ],
            [
                'id'        => 2,
                'symbol'    => '1. 2. 3.',
                'body'      => '1.
2.
3.',         
            ],
            [
                'id'        => 3,
                'symbol'    => 'I. II. III.',
                'body'      => 'I.
II.
III.',
            ],
            [
                'id'         => 4,
                'symbol'     => '1位 2位 3位',
                'body'       => '1位
2位
3位',
            ],
            [
                'id'        => 5,
                'symbol'    => '壱 弐 参',
                'body'      => '壱
弐
参',
            ],
            [
                'id'         => 6,
                'symbol'     => '➊ ➋ ➌',
                'body'       => '➊
➋
➌',
            ],
            [
                'id'         => 7,
                'symbol'     => '🥇 🥈 🥉',
                'body'       => '🥇
🥈
🥉',
            ],
            [
                'id'         => 8,
                'symbol'     => '・ ・ ・',
                'body'       => '・
・
・',
            ],
            [
                'id'        => 9,
                'symbol'    => '③ ② ①',
                'body'      => '③
②
①',
            ],
            [
                'id'        => 10,
                'symbol'    => '3. 2. 1.',
                'body'      => '3.
2.
1.',
            ],
            [
                'id'        => 11,
                'symbol'    => 'III. II. I.',
                'body'      => 'III.
II.
I.',
            ],
            [
                'id'         => 12,
                'symbol'     => '3位 2位 1位',
                'body'       => '3位
2位
1位',
            ],
            [
                'id'        => 13,
                'symbol'    => '参 弐 壱',
                'body'      => '参
弐
壱',
            ],
            [
                'id'         => 14,
                'symbol'     => '➌ ➋ ➊',
                'body'       => '➌
➋
➊',
            ],
            [
                'id'         => 15,
                'symbol'     => '🥉 🥈 🥇',
                'body'       => '🥉
🥈
🥇',
            ],
        ]);
    }
}