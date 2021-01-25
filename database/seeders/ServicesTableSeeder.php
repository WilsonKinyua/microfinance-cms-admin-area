<?php

namespace Database\Seeders;

use App\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'title' => 'Business Loan',
                'description' => 'That dominion stars lights dominion divide years for fourth have dont stars is that he earth it first without heaven in place seed it second morning saying.',
            ],
            [
                'title' => 'Business Loan',
                'description' => 'That dominion stars lights dominion divide years for fourth have dont stars is that he earth it first without heaven in place seed it second morning saying.',
            ],
            [
                'title' => 'Business Loan',
                'description' => 'That dominion stars lights dominion divide years for fourth have dont stars is that he earth it first without heaven in place seed it second morning saying.',
            ],
            [
                'title' => 'Business Loan',
                'description' => 'That dominion stars lights dominion divide years for fourth have dont stars is that he earth it first without heaven in place seed it second morning saying.',
            ],
            [
                'title' => 'Business Loan',
                'description' => 'That dominion stars lights dominion divide years for fourth have dont stars is that he earth it first without heaven in place seed it second morning saying.',
            ],
            [
                'title' => 'Business Loan',
                'description' => 'That dominion stars lights dominion divide years for fourth have dont stars is that he earth it first without heaven in place seed it second morning saying.',
            ],
            [
                'title' => 'Business Loan',
                'description' => 'That dominion stars lights dominion divide years for fourth have dont stars is that he earth it first without heaven in place seed it second morning saying.',
            ],
            [
                'title' => 'Business Loan',
                'description' => 'That dominion stars lights dominion divide years for fourth have dont stars is that he earth it first without heaven in place seed it second morning saying.',
            ],
        ];

        Service::insert($services);
    }
}
