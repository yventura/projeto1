<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        $user = new User($request -> all());
    }


}
