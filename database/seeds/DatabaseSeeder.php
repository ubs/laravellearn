<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(KeysTableSeeder::class);
        $this->call(AppsettingsTableSeeder::class);
        $this->call(TaskCommentsTableSeeder::class);
    }
}
