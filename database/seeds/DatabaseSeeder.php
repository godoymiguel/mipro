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
    	$this->call(RolsTableSeeder::class);
        $this->call(PastelTableSeeder::class);
        $this->call(DefaultIndustryTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
    }
}
