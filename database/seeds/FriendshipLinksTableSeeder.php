<?php

use Illuminate\Database\Seeder;

class FriendshipLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friendship_links')->delete();
        DB::table('friendship_links')->insert(array(

        	0 => array(
        		'id' => 1,
        		'name' => 'XXX',
        		'url' => 'www.baidu.com',
        		'sort' => 1,
        		'created_at' => '2018-11-20 10:00:05',
        		'updated_at' => '2018-11-20 10:00:05',
        		'deleted_at' => NULL,

        	),
        ));
    }
}
