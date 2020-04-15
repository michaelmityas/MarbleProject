<?php

use Illuminate\Database\Seeder;

class SuppliersableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            'marble_type' => Str::random(10),
            'supplier_name' => Str::random(10),
            'marble_code' => Str::random(10),
            'marble_price' => Str::random(10),
            'paid' => Str::random(10),      
        ]);

        // factory(App\User::class, 50)->create()->each(function ($user) {
        //     $user->posts()->save(factory(App\Post::class)->make());
        // });
    }
}
