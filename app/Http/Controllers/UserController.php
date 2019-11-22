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

    public function add(Request $request){
        //we are using validation to ensure the field exists
        $this->validate($request, [
            "id" => "required",
            "password" => "required",
            "comments" => "required"
        ]);

        if ($request->password != '720DF6C2482218518FA20FDC52D4DED7ECC043AB') return response()->json('invalid password', 401);

        if (!is_numeric($request->id)) return response()->json('invalid id', 422);

        $user = User::find($request->id);

        if (!isset($user)) {
            return response()->json('No such user (1)');
        }
        
        $user->comments .= "\n".$request->comments; 

        if ($user->save()) {
            return response()->json('OK');
        } else {
            return response()->json('Could not update database', 500);
        }
        
    }
}
