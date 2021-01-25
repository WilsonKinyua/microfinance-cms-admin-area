<?php

namespace Database\Seeders;

use App\Blog;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = [
            [
                'title' => 'Dont stars is that he earth it',
                'description' => 'That dominion stars lights dominion divide years for fourth have dont stars is that he earth it first without heaven in place seed it second morning saying.',
                'category' => 'Travel, Lifestyle',
                'file' => 'images/blogs/single_blog_1.png'
            ],
            [
                'title' => 'Dont stars is that he earth it',
                'description' => 'That dominion stars lights dominion divide years for fourth have dont stars is that he earth it first without heaven in place seed it second morning saying.',
                'category' => 'Travel, Lifestyle',
                'file' => 'images/blogs/single_blog_2.png'
            ],
            [
                'title' => 'Dont stars is that he earth it',
                'description' => 'That dominion stars lights dominion divide years for fourth have dont stars is that he earth it first without heaven in place seed it second morning saying.',
                'category' => 'Travel, Lifestyle',
                'file' => 'images/blogs/single_blog_3.png'
            ],
            [
                'title' => 'Dont stars is that he earth it',
                'description' => 'That dominion stars lights dominion divide years for fourth have dont stars is that he earth it first without heaven in place seed it second morning saying.',
                'category' => 'Travel, Lifestyle',
                'file' => 'images/blogs/single_blog_4.png'
            ],
            [
                'title' => 'Dont stars is that he earth it',
                'description' => 'That dominion stars lights dominion divide years for fourth have dont stars is that he earth it first without heaven in place seed it second morning saying.',
                'category' => 'Travel, Lifestyle',
                'file' => 'images/blogs/single_blog_5.png'
            ],

        ];

        Blog::insert($blogs);
        
    }
}
