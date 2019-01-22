<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //
    public function show(User $user)
    {
    	# code...
    	return view('users.show', compact('user'));
    	
    }
}
