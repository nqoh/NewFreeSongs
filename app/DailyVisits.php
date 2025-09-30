<?php

namespace App;
use App\Models\Daily_visits;
use Illuminate\Http\Request;

trait DailyVisits
{
    public function visits(Request $request, Object $data, String $visited_type)
    {
        $ip_address = $request->ip();
        $userAgent = $request->userAgent();

       $visits = Daily_visits::where('ip_address', $ip_address)
                              ->where('user_agent',$userAgent)
                              ->where('visited_type',$visited_type)
                              ->where('visited_id', $data->id)
                              ->first();
       if(!$visits)
       {
          $data->update(['daily_visits' => $data->daily_visits + 1]);  
          $data->visits()->create([
               'ip_address' => $ip_address,
               'user_agent' => $userAgent
          ]);
       }
    }
}
