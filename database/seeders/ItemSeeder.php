<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'user_id' => 1,
                'information' => 'ここにキャプションが入ります1。ここにキャプションが入ります1。',
                'filename' => '',
            ],
            [
                'user_id' => 2,
                'information' => 'ここにキャプションが入ります2。ここにキャプションが入ります2。',
                'filename' => '',
            ],
            [
                'user_id' => 3,
                'information' => 'ここにキャプションが入ります3。ここにキャプションが入ります3。',
                'filename' => '',
            ],
        ]);
    }
}
