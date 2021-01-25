<?php

namespace Database\Seeders;

use App\Team;
use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = [
            [
                'full_name' => 'John Doe',
                'professionalism' => 'Volunteer Doctor',
                'facebook' => 'johndoe',
                'twitter' => 'johndoe',
                'website' => 'https://bruceroberts.com',
                'instagram' => 'johndoe',
                'email' => 'johndoe2mail.com',
                'file' => 'images/team/1611261873image2.jpg',
            ],
            [
                'full_name' => 'John Doe',
                'professionalism' => 'Volunteer Doctor',
                'facebook' => 'johndoe',
                'twitter' => 'johndoe',
                'website' => 'https://bruceroberts.com',
                'instagram' => 'johndoe',
                'email' => 'johndoe2mail.com',
                'file' => 'images/team/1611261956home_blog2.png',
            ],
            [
                'full_name' => 'John Doe',
                'professionalism' => 'Volunteer Doctor',
                'facebook' => 'johndoe',
                'twitter' => 'johndoe',
                'website' => 'https://bruceroberts.com',
                'instagram' => 'johndoe',
                'email' => 'johndoe2mail.com',
                'file' => 'images/team/1611262294images-10-1.jpeg',
            ],
            [
                'full_name' => 'John Doe',
                'professionalism' => 'Volunteer Doctor',
                'facebook' => 'johndoe',
                'twitter' => 'johndoe',
                'website' => 'https://bruceroberts.com',
                'instagram' => 'johndoe',
                'email' => 'johndoe2mail.com',
                'file' => 'images/team/1611492782image2.jpg',
            ]
        ];

        Team::insert($team);
    }
}
