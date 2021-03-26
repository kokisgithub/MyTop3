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
                'symbol'    => '① ② ③',
                'body'      => '①
②
③',
            ],
            [
                'symbol'    => '1. 2. 3.',
                'body'      => '1.
2.
3.',         
            ],
            [
                'symbol'    => 'I. II. III.',
                'body'      => 'I.
II.
III.',
            ],
            [
                'symbol'    => '壱 弐 参',
                'body'      => '壱 
弐 
参 ',
            ],
            [
                'symbol'     => '・ ・ ・',
                'body'       => '・
・
・',
            ],
        ]);
    }
}