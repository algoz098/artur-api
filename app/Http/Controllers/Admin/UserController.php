<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{
    public function select(){
        $users = User::whereNotNull('uid')
            ->select('id as value', 'uid as label')
            ->get();

        return $users;
    }

    public function index(){
        $users = User::paginate(10);

        $data = [
            'users'    => $users,
        ];

        return view('admin/users/index')->with($data);
    }
}
