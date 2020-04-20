<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request) {
        $user = Auth::user();

        $errors = [];

        if ($request->isMethod('post')) {
            if(!$request['new_password']) {
                $request['new_password'] = $request['password'];
            }

            $this->validate($request, User::rules());
            if (Hash::check($request->post('password'), $user->password)) {

                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('new_password')),
                    'email' => $request->post('email')
                ]);
                $user->save();

                $request->session()->flash('success', 'Данные пользователя успешно изменены.');
            } else {
                $errors['password'][] = 'Неверно введен текущий пароль';
            }
            return redirect()->route('updateProfile')->withErrors($errors);
        }

        return view('profile', [
            'user' => $user
        ]);
    }
}
