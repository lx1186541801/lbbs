<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();

        // 单独处理第一个数据
        $user = User::find(1);
        $user->name = 'Robert';
        $user->email = 'robert@qq.com';
        
        $user->avatar = 'http://lbbs.test/uploads/images/avatars/202106/21/1_1624238089_J6eqJwFPvd.png';

        $user->save();
    }
}
