<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Message;
use App\Models\Reply;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      User::factory(1)->has(
			Message::factory()->count(15)
						->has(Reply::factory()->count(mt_rand(0,3))
		))
		->create();
     //Message::factory()->count(1)->create();
    }
}
