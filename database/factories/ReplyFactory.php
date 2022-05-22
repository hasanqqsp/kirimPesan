<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reply;
use Illuminate\Support\Str;
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {	
		$id = strtolower(Str::random(8));
	
		while(Reply::find($id)){
			$id = strtolower(Str::random(8));
		};
         return [
				'id' => $id,
              'message' => $this->faker->paragraph(mt_rand(1,5))
           
        ];
    }
}
