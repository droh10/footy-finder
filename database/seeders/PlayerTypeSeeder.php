<?php

namespace Database\Seeders;

use App\Models\PlayerType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlayerTypeSeeder extends Seeder
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
                'title'=>'Mixed',
                'status'=>'A'
            ],
            [
                'title'=>'Women',
                'status'=>'A'
            ],
            [
                'title'=>'Men',
                'status'=>'A'
            ]
        ];
        foreach ($player_type as $type) {
            PlayerType::create($type);
        }
    }
}
