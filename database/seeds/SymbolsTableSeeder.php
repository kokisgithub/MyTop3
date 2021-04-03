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
                'id'        => 4,
                'symbol'    => '壱 弐 参',
                'body'      => '壱 
弐 
参 ',
            ],
            [
                'id'         => 5,
                'symbol'     => '・ ・ ・',
                'body'       => '・
・
・',
            ],
        ]);
    }
}