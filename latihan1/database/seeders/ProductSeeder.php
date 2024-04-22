<?php

namespace Database\Seeders;

use App\Models\Product;
use faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        #product1
        $p = new Product();
        $p->barcode = $faker->numerify('######');
        $p->name = 'Buku';
        $p->price = '3000';
        $p->save();
        #product2
        $p = new Product();
        $p->barcode = $faker->numerify('######');
        $p->name = 'Sepatu';
        $p->price = '35000';
        $p->save();
        #product3
        $p = new Product();
        $p->barcode = $faker->numerify('######');
        $p->name = 'pulpen';
        $p->price = '2500';
        $p->save();
        #product4
        $p = new Product();
        $p->barcode = $faker->numerify('######');
        $p->name = 'Buku Gambar';
        $p->price = '2000';
        $p->save();
        #product5
        $p = new Product();
        $p->barcode = $faker->numerify('######');
        $p->name = 'Pensil';
        $p->price = '1000';
        $p->save();


    }
}
