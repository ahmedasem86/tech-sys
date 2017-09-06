<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create('App\Product');
      for($i=0 ; $i<50 ; $i++){
        DB::table('products')->insert([
                  'product_name' => $faker->name ,
                  'customer_id' => $faker->numberBetween($min = 1, $max = 20)  ,
                  'product_name' => $faker->text(10) ,
                  'product_total_price' => $faker->numberBetween($min = 10000, $max = 15000) ,
                  'forepart' => $faker->numberBetween($min = 1, $max = 5000) ,
                  'created_at' => $faker->dateTime($max = 'now'),
                  'updated_at' => $faker->dateTime($max = 'now'),
        ]);
      }
    }
}
