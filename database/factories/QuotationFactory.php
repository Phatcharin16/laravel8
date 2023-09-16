<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuotationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'remark' => "",
            'vat_percent' => 7,
            'vat' => null,
            'sub_total' => null,
            'net_total' => null,
            'customer_id' => Customer::factory(),
            'user_id' => User::factory(),
        ];
    }
}
