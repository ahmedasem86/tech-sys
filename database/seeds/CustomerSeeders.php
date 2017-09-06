<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create('App\Customer');
      for($i=0 ; $i<20 ; $i++){
        DB::table('customers')->insert([
                  'name' => $faker->name ,
                  'user_name' => $faker->name ,
                  'email' => $faker->email ,
                  'id_number' => $faker->numberBetween($min = 1, $max = 12345) ,
                  'age' => $faker->numberBetween($min = 20, $max = 40) ,
                  'address' => $faker->address ,
                  'created_at' => $faker->dateTime($max = 'now'),
                  'updated_at' => $faker->dateTime($max = 'now'),
        ]);
      }
    }
}
