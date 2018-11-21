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
        DB::table('users')->insert(array(
        	0 =>
        	array(
        		'id' => 1,
        		'name' => 'test',
        		'email' => 'test@test.com',
        		'password' => bcrypt(123456),
        		'remember_token' => NUll,
        		'created_at' => '2018-11-20 11:03:20',
        		'updated_at' => '2018-11-20 11:03:20',
        		'deleted_at' => NUll,
        	),
        ));
    }
}
