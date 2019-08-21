<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creating 20  fake categories
        factory(App\Category::class, 20)
            ->create()
            ->each(function ($category) {
                $category->save();
            });
    }
}
