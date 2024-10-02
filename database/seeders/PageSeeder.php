<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = [['title'=>'Home','url'=>'/','main_role'=>'1','parent_id'=>NULL,'submenu_count'=>0,'status'=>1],['title'=>'About','url'=>'about-us','main_role'=>'1','parent_id'=>NULL,'submenu_count'=>0,'status'=>1],['title'=>'Services','url'=>'services','main_role'=>'1','parent_id'=>NULL,'submenu_count'=>0,'status'=>1],['title'=>'Packages','url'=>'packages','main_role'=>'1','parent_id'=>NULL,'submenu_count'=>0,'status'=>1],['title'=>'Careers','url'=>'careers','main_role'=>'1','parent_id'=>NULL,'submenu_count'=>0,'status'=>1],['title'=>'Contact Us','url'=>'contact-us','main_role'=>'1','parent_id'=>NULL,'submenu_count'=>0,'status'=>1],['title'=>'Blogs','url'=>'blogs','main_role'=>'1','parent_id'=>NULL,'submenu_count'=>0,'status'=>1],['title'=>'News','url'=>'news','main_role'=>'1','parent_id'=>NULL,'submenu_count'=>0,'status'=>1],['title'=>'Legal','url'=>'legal','main_role'=>'1','parent_id'=>NULL,'submenu_count'=>0,'status'=>1],['title'=>'Privacy Policy','url'=>'privacy-policy','main_role'=>'1','parent_id'=>NULL,'submenu_count'=>0,'status'=>1],['title'=>'Terms & Conditions','url'=>'terms-and-conditions','main_role'=>'1','parent_id'=>NULL,'submenu_count'=>0,'status'=>1],['title'=>'General Inquiries','url'=>'general-inquiries','main_role'=>'1','parent_id'=>NULL,'submenu_count'=>0,'status'=>1],['title'=>'Case Studies','url'=>'case-studies','main_role'=>'1','parent_id'=>NULL,'submenu_count'=>0,'status'=>1]];
        foreach ($page as $key => $value) {
            Page::create([
                'title' => $value['title'],
                'url' => $value['url'],
                'main_role' => $value['main_role'],
                'parent_id' => $value['parent_id'],
                'submenu_count' => $value['submenu_count'],
                'status' => $value['status']
            ]);
        }
    }
}
