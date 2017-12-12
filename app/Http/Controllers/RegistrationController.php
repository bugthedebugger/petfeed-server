<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
    	$user = User::create([
    		'name' => $request->email,
    		'email' => $request->email,
    		'password' => bcrypt($request->password)
    	]);
    	return $user;
    }

    public function test()
    {
    	return User::first();
    }


    public function login(Request $request)
    {
    	$user = User::where('email', $request->email)->get();
    	if( $user->count() > 0 )
    		$user_flag = 1;
    	else
    		$user_flag = 0;

    	if( $user_flag === 1 )
    	{
			if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
			{
				return [
					'user' => $request->email,
					'status' => 'success',
					'message' => 'User logged in.'
				];
			}
			else
			{
				return [
					'user' => $request->email,
					'status' => 'error',
					'message' => 'Password didn\'t match'
				];
			}
		}
		else
		{
			return [
					'user' => $request->email,
					'status' => 'error',
					'message' => 'User not registered'
				];
		}
    }

}
