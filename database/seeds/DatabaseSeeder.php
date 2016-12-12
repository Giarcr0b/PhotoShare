<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create();
        factory(App\Album::class, 10)->create();
        factory(App\Photo::class, 30)->create();
        
        // $this->call(UsersTableSeeder::class);
    }
}
