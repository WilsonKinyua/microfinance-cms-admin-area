<?php

namespace Database\Seeders;

use App\AboutOurCompany;
use App\Testimony;
use App\WhyChooseOurCompany;
use Illuminate\Database\Seeder;

class AboutOurCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = [
            [
                'title' => 'Building a Brighter financial Future & Good Support.',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, oeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut eniminixm, quis nostrud exercitation ullamco laboris nisi ut aliquip exeaoauat. Duis aute irure dolor in reprehe.
                                    </p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, oeiusmod tempor incididunt ut labore et dolore magna aliq.</p>',
                'file' => 'images/about/6009e6ffdbd73_black-male-4568761_1920.jpg'
            ],
        ];

        AboutOurCompany::insert($about);

        $about2 = [
            [
                'title' => 'We Promise Sustainable Future For You.',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, oeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut eniminixm, quis nostrud exercitation ullamco laboris nisi ut aliquip exeaoauat. Duis aute irure dolor in reprehe.</p>',
                'file' => 'images/about/6009e752ea8cb_imag2.jpg'
            ],
        ];

        WhyChooseOurCompany::insert($about2);

        $testis = [
            [
                'name' => 'Jessya Inn',
                'professionalism' => 'Co Founder',
                'testimonial_caption' => 'Logistics Group is a representative logistics operator providing a full range of ser of customs clearance and transportation world.',
                'file' => 'images/testimonies/6009ea66efa16_Homepage_testi.png'
            ],
        ];

        Testimony::insert($testis);

    }
}
