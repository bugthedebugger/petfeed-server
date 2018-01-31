<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\eventTrigger;
use Auth;
use App\User;

class SchedulesController extends Controller
{

    private static function checkUser($email, $id)
    {
        $user_check = User::where('id', $id)->where('email', $email)->first();

        if( !empty($user_check) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getStatus(Request $request)
    {
        $email = $request->email;
        $id = $request->id;

        $user_check = $this->checkUser($email, $id);

        if( $user_check )
        {
            $data = [
                'get' => 'status',
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

    public function getSchedule(Request $request)
    {
    	$email = $request->email;
    	$id = $request->id;

    	$user_check = $this->checkUser($email, $id);

    	if( $user_check )
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

        //\Log::info($request->all());
        //return $request->all();

        $user_check = $this->checkUser($email, $id);

        if( $user_check )
        {
            $schedule_data = [];
            $data = [];
            try{
                $day_count = count($request->data);

                for( $i = 0; $i < $day_count; $i++ )
                {
                    $temp_object = $request->data[$i];
                    array_push($schedule_data, [
                        'day' => $temp_object['day'],
                        'time' => $temp_object['time']
                    ]);
                }
            }
            catch(\Exception $e)
            {
                
            }

            // dd($data);
            if( !empty($schedule_data) )
            {
                $data = [
                    'set' => 'schedule',
                    'user' => $email,
                    'data' => $schedule_data
                ];

                $response = [
                    'status' => 'success'
                ];
            }
            else
            {
                $response = [
                    'status' => 'error',
                    'message' => 'Empty schedule recieved!'
                ];

                return $response;
            }

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
