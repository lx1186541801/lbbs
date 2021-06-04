<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * 重写 trait 中的 此方法
     * @Author   Robert
     * @DateTime 2021-06-04
     * @param    Request    $request  [description]
     * @param    [type]     $response [description]
     * @return   [type]               [description]
     */
    protected function sendResetResponse(Request $request, $response)
    {
        session()->flash('success', '密码更新成功！请重新登录');
        return redirect($this->redirectPath());

    }
}
