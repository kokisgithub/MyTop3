<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id'                => 1,
            'name'              => 'sample_admin',
            'email'             => 'sample_admin@example.com',
            'password'          => Hash::make('sample_admin'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
