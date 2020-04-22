<?php

namespace App\Http\Controllers;

use App\Adaptors\Adaptor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function loginVK() {
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(Adaptor $userAdaptor) {
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        $user = Socialite::driver('vkontakte')->user();

        $userInSystem = $userAdaptor->getUserBySocId($user, 'vk');

        if (!is_null($userInSystem)) {
            Auth::login($userInSystem);
            if ($userInSystem->isNew === true) {
                return redirect()->route('Home')->with('success', 'Ваш текущий пароль "123", смените пароль на странице "Изменить профиль"');
            } else {
                return redirect()->route('Home');
            }
        } else {
            return redirect()->route('login')->with('error', 'Пользователь с таким email уже существует');
        }
    }
}
