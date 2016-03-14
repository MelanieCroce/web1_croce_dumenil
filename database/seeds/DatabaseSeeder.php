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
        //DB::table('users')->truncate(); // Vide la base de données
       	$this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}
