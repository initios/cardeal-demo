<?php

use Illuminate\Database\Seeder;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::findOrFail(1);
        $user->tweets()->create(['content' => 'Mi primer Tweet']);
        $user->tweets()->create(['content' => '¡Le voy pillando el truco!']);
        $user->tweets()->create(['content' => 'Sólo uno más.']);
        \App\Tweet::create(['content' => 'Este está creado desde el propio Tweet', 'user_id' => $user->id]);
    }
}
