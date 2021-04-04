<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id'                => 1,
                'name'              => 'user',
                'email'             => 'user@example.com',
                'password'          => Hash::make('12345678'),
                'remember_token'    => Str::random(10),
                'image'             => null,
            ],
            [
              'id'                => 2,
              'name'              => 'ジョン',
              'email'             => 'john@example.com',
              'password'          => Hash::make('19401009'),
              'remember_token'    => Str::random(10),
              'image'             => null,
          ],
          [
              'id'                => 3,
              'name'              => 'ポール',
              'email'             => 'paul@example.com',
              'password'          => Hash::make('19420618'),
              'remember_token'    => Str::random(10),
              'image'             => null,
          ],
          [
              'id'                => 4,
              'name'              => 'ジョージ',
              'email'             => 'george@example.com',
              'password'          => Hash::make('19430225'),
              'remember_token'    => Str::random(10),
              'image'             => null,
          ],
          [
              'id'                => 5,
              'name'              => 'リンゴ',
              'email'             => 'ringo@example.com',
              'password'          => Hash::make('19400707'),
              'remember_token'    => Str::random(10),
              'image'             => null,
          ],
        ]);
    }
}