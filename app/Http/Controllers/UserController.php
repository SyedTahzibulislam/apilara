<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index($id=null)
    {

if ($id== null)
{


    $u= User::get();

    return response()->json(['user' => $u  ]);
}
else{

    $u= User::findOrFail($id);

    return response()->json(['user' => $u  ]);

}

    
    
    }



public function store(Request $request)
{


    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);
    
    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }
    
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->save();
    
    return response()->json(['success' => 'data added successfully'], 200);


}














}
