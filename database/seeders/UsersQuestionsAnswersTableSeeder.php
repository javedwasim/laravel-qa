<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('answers')->delete();
        \DB::table('questions')->delete();
        \DB::table('users')->delete();

        \App\Models\User::factory()->create()->each(function($u) {
            $u->questions()
              ->saveMany(
                  factory(App\Question::class, rand(1, 5))->make()
              )
              ->each(function ($q) {
                $q->answers()->saveMany(factory(App\Answer::class, rand(1, 5))->make());
              });
        });  
    }
}
