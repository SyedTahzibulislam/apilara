<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index($id=null)
    {

if ($id== null)
{


    $user= User::all();

    return response()->json(['user' => $user  ]);
}
else{

    $user= User::findOrFail($id);

    return response()->json(['user' => $user  ]);

}

    
    
    }
}
