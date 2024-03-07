<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Coupon;
use App\Models\Product;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);
        Slider::factory(5)->create();
        $this->call(WhyChooseUsTitleSeeder::class);
        $this->call(WhyChooseUs::factory(3)->create());
        $this->call(CategorySeeder::class);
        Product::factory(10)->create();
        Coupon::factory(3)->create();
    }
}
