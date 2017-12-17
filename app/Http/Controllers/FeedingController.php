<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\eventTrigger;
use App\User;

class FeedingController extends Controller
{
    public function treat(Request $request)
    {
    	$email = $request->email;
    	$id = $request->id;

    	$user_check = User::where('id', $id)->where('email', $email)->first();

    	if( !empty($user_check) )
		{	
			$data = [
				'feed' => 'treat',
				'user' => $email
			];

			$response = [
				'status' => 'success'
			];
			event(new eventTrigger($data));
			return $response;
    	}
    	else
    	{	$response = [
				'status' => 'error'
			];
    		return $response;
    	}
    }
}
