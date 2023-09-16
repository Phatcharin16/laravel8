<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaveRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeThisYear('+3 months');
        return [
            //
            'user_id' => User::factory(),
            'leave_type_name' => $this->faker->randomElement(['sick', 'personal', 'vacation']),
            'start_date' => $date,
            'end_date' => $date,
            'total_leave' => 1,
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']) ,
            'comments' => "",
            'approver_id' => 1,
        ];
    }
}
