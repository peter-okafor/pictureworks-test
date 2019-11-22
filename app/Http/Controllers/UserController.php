<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        
        if ($user) {
            return view('welcome', ['user' => $user]);
        } else {
            return response()->json('No such user (2)');
        }
        
    }
}
