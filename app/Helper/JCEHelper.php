<?php
namespace App\Helper;
use App\PNR;
use Auth;
use App\JCE;
use App\Commodity;
use App\ManualLog;
use App\InESSCE;
use Carbon\Carbon;

class JCEHelper
{
	
	public function assignedrequest()
	{
           $assigned=PNR::where('Respective_JCE',Auth::user()->email)->where('PNR_Status','Open')->where('PNR_CurrentStatus','Juniper CE Assessment Required')->get();
           
           return $assigned;
	}

    public function updateByJCE($jce)
    {
      $jceupdate=JCE::updateOrCreate(['Request_ID' => $jce['Request_ID']]);
    	$jceupdate=JCE::where('Request_ID',$jce['Request_ID'])->update($jce);
            $manuallogupdate = new ManualLog;
            $manuallogupdate->Request_ID = $jce['Request_ID'];
            $manuallogupdate->Description = "JCE Has Updated Details For PNR Request";
            $manuallogupdate->Date = Carbon::now()->toDateString();
            $manuallogupdate->Causer = Auth::user()->name;
            $manuallogupdate->save();
      if($jce['Assessment_Status'] == 'CE Assessment Completed')
        {
       $masterupdate=PNR::where('Request_ID',$jce['Request_ID'])->update(['PNR_CurrentStatus' =>'InESS CE Assessment Required']);
            $manuallogupdate = new ManualLog;
            $manuallogupdate->Request_ID = $jce['Request_ID'];
            $manuallogupdate->Description = "JCE Completed His/Her Assessment and Forwarded to InESS CE";
            $manuallogupdate->Date = Carbon::now()->toDateString();
            $manuallogupdate->Causer = Auth::user()->name;
            $manuallogupdate->save();
         }
        if($jce['Disposition'] == 'Feedback')
        {
          $feedbackUpdate=InESSCE::where('Request_ID',$jce['Request_ID'])->update(['CE_Assesment_Status' => 'CE Assessment Required']);
          $masterupdate=PNR::where('Request_ID',$jce['Request_ID'])->update(['PNR_CurrentStatus' =>'Juniper CE Assessment Required']);
        }
    	return $jceupdate;
    }
}
