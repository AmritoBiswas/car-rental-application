<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            [
                'name' => 'Model S',
                'brand' => 'Tesla',
                'model' => 'S',
                'year' => 2022,
                'car_type' => 'Sedan',
                'daily_rent_price' => 150,
                'availability' => true,
                'image_url' => '/uploads/car (1).jpg',
            ],
            [
                'name' => 'Civic',
                'brand' => 'Honda',
                'model' => 'Civic',
                'year' => 2021,
                'car_type' => 'Sedan',
                'daily_rent_price' => 100,
                'availability' => true,
                'image_url' => '/uploads/car (2).jpg',
            ],
            [
                'name' => 'Mustang',
                'brand' => 'Ford',
                'model' => 'Mustang',
                'year' => 2022,
                'car_type' => 'Coupe',
                'daily_rent_price' => 200,
                'availability' => true,
                'image_url' => '/uploads/car (3).jpg',
            ],
            [
                'name' => 'Corolla',
                'brand' => 'Toyota',
                'model' => 'Corolla',
                'year' => 2021,
                'car_type' => 'Sedan',
                'daily_rent_price' => 90,
                'availability' => true,
                'image_url' => '/uploads/car (4).jpg',
            ],
            [
                'name' => 'Cherokee',
                'brand' => 'Jeep',
                'model' => 'Grand Cherokee',
                'year' => 2020,
                'car_type' => 'SUV',
                'daily_rent_price' => 140,
                'availability' => true,
                'image_url' => '/uploads/car (5).jpg',
            ],
            [
                'name' => 'Camry',
                'brand' => 'Toyota',
                'model' => 'Camry',
                'year' => 2022,
                'car_type' => 'Sedan',
                'daily_rent_price' => 120,
                'availability' => true,
                'image_url' => '/uploads/car (6).jpg',
            ],
            [
                'name' => 'Accord',
                'brand' => 'Honda',
                'model' => 'Accord',
                'year' => 2021,
                'car_type' => 'Sedan',
                'daily_rent_price' => 110,
                'availability' => true,
                'image_url' => '/uploads/car (7).jpg',
            ],
            [
                'name' => 'Model 3',
                'brand' => 'Tesla',
                'model' => '3',
                'year' => 2022,
                'car_type' => 'Sedan',
                'daily_rent_price' => 130,
                'availability' => true,
                'image_url' => '/uploads/car (8).jpg',
            ],
            [
                'name' => 'X5',
                'brand' => 'BMW',
                'model' => 'X5',
                'year' => 2021,
                'car_type' => 'SUV',
                'daily_rent_price' => 160,
                'availability' => true,
                'image_url' => '/uploads/car (9).jpg',
            ],
            [
                'name' => 'A4',
                'brand' => 'Audi',
                'model' => 'A4',
                'year' => 2020,
                'car_type' => 'Sedan',
                'daily_rent_price' => 140,
                'availability' => true,
                'image_url' => '/uploads/car (10).jpg',
            ],
            [
                'name' => 'Q5',
                'brand' => 'Audi',
                'model' => 'Q5',
                'year' => 2021,
                'car_type' => 'SUV',
                'daily_rent_price' => 150,
                'availability' => true,
                'image_url' => '/uploads/car (11).jpg',
            ],
            [
                'name' => 'CX-5',
                'brand' => 'Mazda',
                'model' => 'CX-5',
                'year' => 2022,
                'car_type' => 'SUV',
                'daily_rent_price' => 130,
                'availability' => true,
                'image_url' => '/uploads/car (12).jpg',
            ],
            [
                'name' => 'Impreza',
                'brand' => 'Subaru',
                'model' => 'Impreza',
                'year' => 2021,
                'car_type' => 'Sedan',
                'daily_rent_price' => 110,
                'availability' => true,
                'image_url' => '/uploads/car (13).jpg',
            ],
            [
                'name' => 'Altima',
                'brand' => 'Nissan',
                'model' => 'Altima',
                'year' => 2020,
                'car_type' => 'Sedan',
                'daily_rent_price' => 100,
                'availability' => true,
                'image_url' => '/uploads/car (14).jpg',
            ],
            [
                'name' => 'Model X',
                'brand' => 'Tesla',
                'model' => 'X',
                'year' => 2022,
                'car_type' => 'SUV',
                'daily_rent_price' => 180,
                'availability' => true,
                'image_url' => '/uploads/car (15).jpg',
            ],
        ]);
    }
}
