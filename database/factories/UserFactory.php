<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   $id = strtolower(Str::random(8));
	
		while(User::find($id)){
			$id = strtolower(Str::random(8));
		};
        return [
			'id' => $id,
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // 
            'bio' => $this->faker->paragraph(6),
            'defaultHide' => mt_rand(0,1),          
        ];
    }

   
}
