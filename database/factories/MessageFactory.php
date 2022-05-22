<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Message;
use Illuminate\Support\Str;
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {	
		$id = strtolower(Str::random(8));
	
		while(Message::find($id)){
			$id = strtolower(Str::random(8));
		};
        return [
           
			  'id' => $id,
              'message' =>  $this->faker->paragraph(),
            
        ];
    }
}
