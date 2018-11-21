<?php

use Illuminate\Database\Seeder;

class OauthUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_users')->delete();
        DB::table('oauth_users')->insert(array(
        	0 => array(
        		'id' => 1,
        		'type' => 1,
        		'name' => 'test',
        		'avatar' => '/uploads/article/default.jpg',
        		'openid' => '',
        		'access_token' => '',
        		'last_login_ip' => '127.0.0.1',
        		'login_times' => 1,
        		'email' => 'test@test.com',
        		'is_admin' => 0,
        		'created_at' => '2018-11-20 14:00:00',
        		'updated_at' => '2018-11-20 14:00:00',
        		'deleted_at' => NULL,
        	),
        ));
    }
}
