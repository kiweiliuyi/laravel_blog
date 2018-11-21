<?php

use Illuminate\Database\Seeder;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chats')->delete();
        DB::table('chats')->insert(array(
        		'id' => 1 ,
        		'content' => '以有涯随无涯，殆已',
        		'created_at' => '2018-11-20 14:50:21',
        		'updated_at' => '2018-11-20 14:50:21',
        		'deleted_at' => NULL,

        	 ));
    }
}
