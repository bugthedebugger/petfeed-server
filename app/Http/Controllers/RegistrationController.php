<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\UserInfo;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:4',
    		'name' => 'required',
    		'pet' => 'required',
    		'address' => 'required'
    	]);

    	try{
	    	$user = User::create([
	    		'name' => $request->name,
	    		'email' => $request->email,
	    		'password' => bcrypt($request->password)
	    	]);

	    	UserInfo::create([
	    		'user_id' => $user->id,
	    		'pet_name' => $request->pet,
	    		'address' => $request->address
	    	]);

	    	$response = [
	    		'status' => 'success',
	    		'name' => $user->name,
	    		'email' => $user->email,
	    		'id' => $user->id,
	    		'message' => 'User registered successfully',
	    		'pet' => $user->userinfo->pet_name
	    	];
	    }catch (\Exception $e){
	    	$response = [
	    		'status' => 'error',
	    		'message' => 'User already registered.'
	    	];
	    }

    	return $response;
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
					'email' => Auth::user()->email,
					'status' => 'success',
					'message' => 'User logged in.',
					'name' => Auth::user()->name,
					'id' => Auth::user()->id,
					'pet' => Auth::user()->userinfo->pet_name
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
