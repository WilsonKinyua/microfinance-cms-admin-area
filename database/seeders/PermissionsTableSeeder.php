<?php

namespace Database\Seeders;

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'service_create',
            ],
            [
                'id'    => 18,
                'title' => 'service_edit',
            ],
            [
                'id'    => 19,
                'title' => 'service_show',
            ],
            [
                'id'    => 20,
                'title' => 'service_delete',
            ],
            [
                'id'    => 21,
                'title' => 'service_access',
            ],
            [
                'id'    => 22,
                'title' => 'contact_create',
            ],
            [
                'id'    => 23,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 24,
                'title' => 'contact_show',
            ],
            [
                'id'    => 25,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 26,
                'title' => 'contact_access',
            ],
            [
                'id'    => 27,
                'title' => 'blog_create',
            ],
            [
                'id'    => 28,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 29,
                'title' => 'blog_show',
            ],
            [
                'id'    => 30,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 31,
                'title' => 'blog_access',
            ],
            [
                'id'    => 32,
                'title' => 'about_access',
            ],
            [
                'id'    => 33,
                'title' => 'about_our_company_create',
            ],
            [
                'id'    => 34,
                'title' => 'about_our_company_edit',
            ],
            [
                'id'    => 35,
                'title' => 'about_our_company_show',
            ],
            [
                'id'    => 36,
                'title' => 'about_our_company_delete',
            ],
            [
                'id'    => 37,
                'title' => 'about_our_company_access',
            ],
            [
                'id'    => 38,
                'title' => 'why_choose_our_company_create',
            ],
            [
                'id'    => 39,
                'title' => 'why_choose_our_company_edit',
            ],
            [
                'id'    => 40,
                'title' => 'why_choose_our_company_show',
            ],
            [
                'id'    => 41,
                'title' => 'why_choose_our_company_delete',
            ],
            [
                'id'    => 42,
                'title' => 'why_choose_our_company_access',
            ],
            [
                'id'    => 43,
                'title' => 'team_create',
            ],
            [
                'id'    => 44,
                'title' => 'team_edit',
            ],
            [
                'id'    => 45,
                'title' => 'team_show',
            ],
            [
                'id'    => 46,
                'title' => 'team_delete',
            ],
            [
                'id'    => 47,
                'title' => 'team_access',
            ],
            [
                'id'    => 48,
                'title' => 'testimony_create',
            ],
            [
                'id'    => 49,
                'title' => 'testimony_edit',
            ],
            [
                'id'    => 50,
                'title' => 'testimony_show',
            ],
            [
                'id'    => 51,
                'title' => 'testimony_delete',
            ],
            [
                'id'    => 52,
                'title' => 'testimony_access',
            ],
            [
                'id'    => 53,
                'title' => 'home_page_access',
            ],
            [
                'id'    => 54,
                'title' => 'home_page_slide_create',
            ],
            [
                'id'    => 55,
                'title' => 'home_page_slide_edit',
            ],
            [
                'id'    => 56,
                'title' => 'home_page_slide_show',
            ],
            [
                'id'    => 57,
                'title' => 'home_page_slide_delete',
            ],
            [
                'id'    => 58,
                'title' => 'home_page_slide_access',
            ],
            [
                'id'    => 59,
                'title' => 'social_media_link_create',
            ],
            [
                'id'    => 60,
                'title' => 'social_media_link_edit',
            ],
            [
                'id'    => 61,
                'title' => 'social_media_link_show',
            ],
            [
                'id'    => 62,
                'title' => 'social_media_link_delete',
            ],
            [
                'id'    => 63,
                'title' => 'social_media_link_access',
            ],
            [
                'id'    => 64,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
