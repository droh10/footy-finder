<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PlayType;

class PlayTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $player_type = [
            [
                'title'=>'Fun footy',
                'status'=>'A'
            ],
            [
                'title'=>'Semi Competitive',
                'status'=>'A'
            ],
            [
                'title'=>'Competitive',
                'status'=>'A'
            ]
        ];
        foreach ($player_type as $type) {
            PlayType::create($type);
        }
    }
}
