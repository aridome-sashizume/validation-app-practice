<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        return view('register_success');
    }
}
