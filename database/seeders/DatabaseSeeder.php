<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('products')->insert([
            'name' => 'Strawberry Banana',
            'price' => '29.99',
            'image' => '/images/products/prime_sb.webp',
        ]);

        DB::table('products')->insert([
            'name' => 'Cherry Freeze',
            'price' => '29.99',
            'image' => '/images/products/prime_cf.webp',
        ]);

        DB::table('products')->insert([
            'name' => 'Lemonade',
            'price' => '29.99',
            'image' => '/images/products/prime_lmnd.webp',
        ]);

        DB::table('products')->insert([
            'name' => 'Strawberry Watermelon',
            'price' => '29.99',
            'image' => '/images/products/prime_sw.webp',
        ]);

        DB::table('products')->insert([
            'name' => 'Meta Moon',
            'price' => '29.99',
            'image' => '/images/products/prime_mm.webp',
        ]);

        DB::table('products')->insert([
            'name' => 'Ice Pop',
            'price' => '29.99',
            'image' => '/images/products/prime_ip.webp',
        ]);

        DB::table('products')->insert([
            'name' => 'Blue Raspberry',
            'price' => '29.99',
            'image' => '/images/products/prime_br.webp',
        ]);

        DB::table('products')->insert([
            'name' => 'Tropical Punch',
            'price' => '29.99',
            'image' => '/images/products/prime_tp.webp',
        ]);

        DB::table('products')->insert([
            'name' => 'Lemon Lime',
            'price' => '29.99',
            'image' => '/images/products/prime_ll.webp',
        ]);

        DB::table('products')->insert([
            'name' => 'Grape',
            'price' => '29.99',
            'image' => '/images/products/prime_grp.webp',
        ]);

        DB::table('products')->insert([
            'name' => 'Orange',
            'price' => '29.99',
            'image' => '/images/products/prime_org.webp',
        ]);
    }
}
