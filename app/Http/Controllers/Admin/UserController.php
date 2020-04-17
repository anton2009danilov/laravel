<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->orWhereNotBetween('id', [\Auth::user()['id'], \Auth::user()['id']])
            ->paginate(5);

        return view('admin.users.index', ['users' => $users]);

    }

    public function update(User $user) {
        if($user->isAdmin) {
            $user->isAdmin = 0;

        } else {
            $user->isAdmin = 1;
        }
        $user->save();
        return redirect()->route('admin.users.index');
    }
}
