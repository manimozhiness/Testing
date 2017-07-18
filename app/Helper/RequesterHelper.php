<?php
namespace App\Helper;
use App\PNR;
use App\Commodity;
use App\ManualLog;
use Carbon\Carbon;

use Auth;

class RequesterHelper
{
	
	public function assignedrequest()
	{
           $assigned=PNR::where('requestorEmail',Auth::user()->email)->get();
           return $assigned;
	}

	public function getRecentActivities($id)
	{
		$act = ManualLog::whereIn('Request_ID',$id)->latest()->get();
        return $act;		
	}


}
