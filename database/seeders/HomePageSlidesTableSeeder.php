<?php

namespace Database\Seeders;

use App\HomePageSlide;
use Illuminate\Database\Seeder;

class HomePageSlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slides = [
            [
                'caption' => 'Achieve your financial goal',
                'description' => 'Small Business Loans For Daily Expenses.',
                'file' => 'images/slides/6009e65ec4b34_image.jpg'
            ],
            [
                'caption' => 'Achieve your financial goal',
                'description' => 'Small Business Loans For Daily Expenses.',
                'file' => 'images/slides/6009e6ad8d9a4_1.png'
            ],

        ];

        HomePageSlide::insert($slides);
    }
}
