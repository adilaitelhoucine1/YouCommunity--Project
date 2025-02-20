<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('events')->delete();
        
        \DB::table('events')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'title' => 'Youcode',
                'description' => 'Voluptatem molestia',
                'date' => '1982-10-26 13:28:00',
                'location' => 'Nador',
                'created_at' => '2025-02-20 13:58:18',
                'updated_at' => '2025-02-20 16:19:40',
                'lieu' => 'Ea rerum amet quo e',
                'max_participants' => 51,
                'status' => 'A venir',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'title' => '1337 event',
                'description' => 'Sint aliquam et expe',
                'date' => '2024-06-06 22:24:00',
                'location' => 'Khribga',
                'created_at' => '2025-02-20 13:59:34',
                'updated_at' => '2025-02-20 13:59:34',
                'lieu' => 'morocoo',
                'max_participants' => 42,
                'status' => 'A venir',
            ),
        ));
        
        
    }
}