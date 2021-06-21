<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $categroiesData = [
            [
                'name' => '分享交流',
                'description' => '分享交流一切',
            ],
            [
                'name' => '教程学习',
                'description' => '教程学习科学文化',
            ],
            [
                'name' => '技术问答',
                'description' => '技术问答你不会的',
            ],
            [
                'name' => '公告',
                'description' => '站点公告',
            ],
        ];

        DB::table('categories')->insert($categroiesData);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
