<?php

namespace App\Policies;

use App\Models\User;


class UserPolicy extends Policy
{
    

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * 授权策略校验
     * @Author   Robert
     * @DateTime 2021-06-21
     * @param    User       $currentUser 当前登录的用户实例 默认载入
     * @param    User       $user        进行授权的用户实例
     * @return   [type]                  [description]
     */ 
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }
}
