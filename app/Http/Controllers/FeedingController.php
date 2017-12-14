<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\eventTrigger;
use Auth;

class FeedingController extends Controller
{
    public function treat(Request $request)
    {
    	$email = $request->email;
    	$password = $request->password;

    	if( Auth::attempt(['email' => $email, 'password' => $password]) )
		{	
			$data = [
				'feed' => 'treat',
				'user' => $email
			];
			event(new eventTrigger($data));
			return 'feeding';
    	}
    	else
    		return 'error';

    }
}
