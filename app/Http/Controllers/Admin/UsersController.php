<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function all()
    {
        $users = User::paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {

    }

    public function store()
    {
        
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
