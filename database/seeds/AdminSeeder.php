<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\User::class, 1)->create([
            'name' => 'Nikolay Grinchar',
            'email' => 'ief07@bk.ru',
            'password' => bcrypt('111111'),
            'remember_token' => str_random(10),
            ]);
      

         factory(App\Survey::class, 2)->create(['user_id'=>1]);
    }
}
