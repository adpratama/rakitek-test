<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::create([
            'category_id' => '1',
            'name' => 'Kemeja flanel pria',
            'price' => '100000',
            'slug' => 'kemeja-flanel-pria'
        ]);
    }
}
