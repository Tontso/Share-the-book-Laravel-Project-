<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * All users has password:"password"
         */
        \App\Models\User::factory()->create(['name' => 'Tommy', 'email' => 'cs03168@example.com']);
        \App\Models\User::factory()->create(['name' => 'Tommy-2', 'email' => 'cs03169@example.com']);
        \App\Models\User::factory()->create(['name' => 'Tommy-3', 'email' => 'cs03170@example.com']);
        \App\Models\User::factory()->create(['name' => 'Tommy-4', 'email' => 'cs03171@example.com']);
        \App\Models\User::factory()->create();

        \App\Models\Genre::factory(5)->create();

        \App\Models\Book::factory(5)->create(['user_id' => '1']);

        DB::table('follow')->insert(
            [
                [
                    'follower' => '1',
                    'followee' => '2',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'follower' => '1',
                    'followee' => '3',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'follower' => '1',
                    'followee' => '4',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'follower' => '2',
                    'followee' => '1',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'follower' => '2',
                    'followee' => '3',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'follower' => '2',
                    'followee' => '4',
                    'created_at' => now(),
                    'updated_at' => now()
                ], [
                    'follower' => '3',
                    'followee' => '1',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}
