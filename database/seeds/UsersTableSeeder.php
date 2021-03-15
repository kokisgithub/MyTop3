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
              'name'              => 'ジョン',
              'email'             => 'john@example.com',
              'password'          => Hash::make('19401009'),
              'remember_token'    => Str::random(10),
              'image'             => 'black-and-white-1284026_1280_604c7e6d9ee6e.jpg',
          ],
          [
              'name'              => 'ポール',
              'email'             => 'paul@example.com',
              'password'          => Hash::make('19420618'),
              'remember_token'    => Str::random(10),
              'image'             => 'bass-guitar-433969_1280_604c80d48485d.jpg',
          ],
          [
              'name'              => 'ジョージ',
              'email'             => 'george@example.com',
              'password'          => Hash::make('19430225'),
              'remember_token'    => Str::random(10),
              'image'             => 'electric-guitars-311034_1280_604c82847c79d.png',
          ],
          [
              'name'              => 'リンゴ',
              'email'             => 'ringo@example.com',
              'password'          => Hash::make('19400707'),
              'remember_token'    => Str::random(10),
              'image'             => 'broken-drumstick-2178387_1280_604c82e9aa261.jpg',
          ],
          [
              'name'              => 'user',
              'email'             => 'user@example.com',
              'password'          => Hash::make('12345678'),
              'remember_token'    => Str::random(10),
              'image'             => null,
          ],
        ]);
    }
}
