<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\eventTrigger;
use Auth;
use App\User;

class SchedulesController extends Controller
{


    public function getSchedule(Request $request)
    {
    	$email = $request->email;
    	$id = $request->id;

    	$user_check = User::where('id', $id)->where('email', $email)->first();

    	if( !empty($user_check) )
    	{
    		$data = [
				'get' => 'schedule',
				'user' => $email
			];
			$response = [
				'status' => 'success'
			];

			event(new eventTrigger($data));
			return $response;
    	}
    	else
    	{
    		$response = [
				'status' => 'error'
			];
			return $response;
    	}
    }

    public function create()
    {
        return view('schedule');
    }

    public function setSchedule(Request $request)
    {
        $email = $request->email;
        $id = $request->id;

        $user_check = User::where('id', $id)->where('email', $email)->first();

        if( !empty($user_check) )
        {

            $schedule_data = [];
            $day_count = count($request->day);

            for( $i = 0; $i < $day_count; $i++ )
            {
                array_push($schedule_data, [
                    'day' => $request->day[$i],
                    'time' => $request->time[$i]
                ]);
            }

            $data = [
                'set' => 'schedule',
                'user' => $email,
                'data' => $schedule_data
            ];

            // dd($data);
            $response = [
                'status' => 'success'
            ];

            event(new eventTrigger($data));
            return $response;
        }
        else
        {
            $response = [
                'status' => 'error'
            ];
            return $response;
        }
    }

}
