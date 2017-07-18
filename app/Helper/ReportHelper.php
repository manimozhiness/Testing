<?php
namespace App\Helper;
use App\PNR;
use App\Commodity;

use Auth;
use App\InESSCE;
use App\JPN_Issue;
use App\JCE;
class ReportHelper
{
  public function getRequestId($request)
  {    $from_date="$request->from_date 00:00:00"; 
       $to_date="$request->to_date 00:00:00"; 

    $pnrreqid = PNR::whereBetween('requestedDate',[$from_date,$to_date])->pluck('Request_ID');

    return $pnrreqid;
  }

  public function getMasterDetails($pnrreqid)
  {
    $details = PNR::whereIn('Request_ID',$pnrreqid)->get();
    return $details;
  }
  public function getInessceDetails($pnrreqid)
  {
    $details = InESSCE::whereIn('Request_ID',$pnrreqid)->get();
    return $details;
  }
  public function getJpnDetails($pnrreqid)
  {
    $details = JPN_Issue::whereIn('Request_ID',$pnrreqid)->get();
    return $details;
  }
  public function getJceDetails($pnrreqid)	
  {
    $details = JCE::whereIn('Request_ID',$pnrreqid)->get();
    return $details;
  }
}
