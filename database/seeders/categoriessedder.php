<?php

namespace Database\Seeders;

use App\Models\categories;
use App\Models\Category;
use Illuminate\Database\Seeder;

class categoriessedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Category();

        $cat->title = [
            'ar' => 'الرياضه',
            'en' => 'sports'
        ];

        $cat->sub_title = [
            'ar' => 'اخبار الرياضه العالميه المحليه اليوميه',
            'en' => 'daily national and local sports news'
        ];
        $cat->save();

        $cat = new Category();
        $cat->title = [
            'ar' => 'الصحه',
            'en' => 'health'
        ];

        $cat->sub_title = [
            'ar' => 'اخبار الصحه العالميه المحليه اليوميه',
            'en' => 'daily national and local health news'
        ];
        $cat->save();

        $cat = new Category();
        $cat->title = [
            'ar' => 'التعليم',
            'en' => 'education'
        ];

        $cat->sub_title = [
            'ar' => 'اخبار العليم العالميه المحليه اليوميه',
            'en' => 'daily national and local education news'
        ];
        $cat->save();

        $cat = new Category();
        $cat->title = [
            'ar' => 'فنون',
            'en' => 'arts'
        ];

        $cat->sub_title = [
            'ar' => 'اخبار الفنون العالميه المحليه اليوميه',
            'en' => 'daily national and local arts news'
        ];
        $cat->save();
    }
}
