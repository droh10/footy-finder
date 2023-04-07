<?php

namespace Database\Factories;


use App\Models\User;
use App\Models\PlayType;
use App\Models\PlayerType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start_time = fake()->time($format = 'H:i:s', $max = 'now');
        
        return [
            'title'=>fake()->sentence(5),
            'description'=>fake()->paragraph(5),
            'user_id' => User::all()->random()->id,
            'venue'=>fake()->address(),
            'date'=>fake()->dateTimeBetween('-1 week', '+2 months'),
            'start_time'=> $start_time,
            'end_time'=> fake()->dateTimeInInterval($start_time, '2 hours'),
            'status'=>"A",
            'play_type_id'=> PlayType::all()->random()->id,
            'player_type_id'=> PlayerType::all()->random()->id,
            "contact_person_name"=>fake()->name(),
            "contact_number"=>fake()->numerify('############'),
            "contact_email"=> fake()->unique()->safeEmail(),
            "max_player"=> fake()->numberBetween(10, 30)
        ];
    }
}
