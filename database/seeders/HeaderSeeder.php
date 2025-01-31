<?php

namespace Database\Seeders;

use App\Models\Header;
use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $headers = [
            ['title' => 'Contact Us', 'url' => '#', 'icon' => 'fa fa-envelope', 'order' => 1],
            ['title' => 'Get News via Email', 'url' => '#', 'icon' => 'fa fa-lock', 'order' => 2],
            ['title' => 'Submit News/Article', 'url' => '#', 'icon' => 'fa fa-newspaper', 'order' => 3],
            ['title' => 'Online EXPO', 'url' => '#', 'icon' => null, 'order' => 4],
            ['title' => 'Networking', 'url' => '#', 'icon' => null, 'order' => 5],
            ['title' => 'Classifieds', 'url' => '#', 'icon' => null, 'order' => 6],
            ['title' => 'News', 'url' => '#', 'icon' => null, 'order' => 7],
        ];

        foreach ($headers as $header) {
            Header::create($header);
        }
    }


}
