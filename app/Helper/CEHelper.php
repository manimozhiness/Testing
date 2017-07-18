<?php
namespace App\Helper;
use App\PNR;
use App\InESSCE;
use App\JPN_Issue;
use App\JCE;
use Auth;
use App\Mail\AssignJCE;
use App\Mail\LibraryTeam;
use App\ManualLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use App\LibraryUpdate;

class CEHelper
{
	
	public function assignedrequest()
	{
           $assigned=PNR::where('Respective_CE',Auth::user()->email)->where('PNR_Status','Open')->where('PNR_CurrentStatus','InESS CE Assessment Required')->get();
           return $assigned;
	}
    

    public function updateCEData($CEUpdate)
    {
       
    	$ceupdate=InESSCE::updateOrCreate(['Request_ID' => $CEUpdate['Request_ID']]);
    	$ceupdate=InESSCE::where('Request_ID',$CEUpdate['Request_ID'])->update($CEUpdate);
            $manuallogupdate = new ManualLog;
            $manuallogupdate->Request_ID = $CEUpdate['Request_ID'];
            $manuallogupdate->Description = "InESS CE Updated Details For PNR Request";
            $manuallogupdate->Date = Carbon::now()->toDateString();
            $manuallogupdate->Causer = Auth::user()->name;
            $manuallogupdate->save();
            
        if($CEUpdate['JCE'] != '')
        {
        $masterupdate=PNR::where('Request_ID',$CEUpdate['Request_ID'])->update(['Respective_JCE' => $CEUpdate['JCE']]);
        $masterupdate=PNR::where('Request_ID',$CEUpdate['Request_ID'])->update(['PNR_CurrentStatus' =>'Juniper CE Assessment Required']);
        $jceupdate=JCE::updateOrCreate(['Request_ID' => $CEUpdate['Request_ID']]);
        $update=JCE::where('Request_ID',$CEUpdate['Request_ID'])->update(['Assessment_Status' => 'CE Assessment Required']);
         $this->assignJCEbyMail($CEUpdate);
            $manuallogupdate = new ManualLog;
            $manuallogupdate->Request_ID = $CEUpdate['Request_ID'];
            $manuallogupdate->Description = "InESS CE Assigned Respective JCE for PNR Request";
            $manuallogupdate->Date = Carbon::now()->toDateString();
            $manuallogupdate->Causer = Auth::user()->name;
            $manuallogupdate->save();
        }

            $data = PNR::where('Request_ID',$CEUpdate['Request_ID'])->first();
        if($data->PNR_Status == 'Closed')
        {

            if($data->symbolFootprintNeeds != 'No Symbol or Footprint Needed')
            {
                if(($data->symbolName == '') || ($data->footPrintName == ''))
                {
                    $pnrupdate=PNR::where('Request_ID',$CEUpdate['Request_ID'])->update([
                       
                        'symbolName' => NULL,
                        'footPrintName' => NULL]);

                    $update = LibraryUpdate::updateOrCreate([
                        'Request_ID' => $CEUpdate['Request_ID'],
                        'Library_Assessment_Status' => 'Assessment Required']);
                    
                     Mail::to('satheesh41mgm@gmail.com')
                    // ->bcc('dwinters@juniper.net')
                    // ->bcc('fnoor@juniper.net')
                    // ->bcc('myuan@juniper.net')
                    // ->bcc('sjames@juniper.net')
                    // ->bcc('spbilki@juniper.net')
                    // ->bcc('tbui@juniper.net')
                      ->send(new LibraryTeam($data));
                }
            }
        }
    	return $ceupdate;
    }

    public function JPNCreate($JPNIssue)
    {
      $jpnissue=JPN_Issue::updateOrCreate(['Request_ID' => $JPNIssue['Request_ID']]);
    	$jpnissue=JPN_Issue::where('Request_ID',$JPNIssue['Request_ID'])->update($JPNIssue);
                 
            $manuallogupdate = new ManualLog;
            $manuallogupdate->Request_ID = $JPNIssue['Request_ID'];
            $manuallogupdate->Description = "InESS CE Updated JPN Details for PNR Request";
            $manuallogupdate->Date = Carbon::now()->toDateString();
            $manuallogupdate->Causer = Auth::user()->name;
            $manuallogupdate->save();

        if($jpnissue['JPN'] != '')
        {
    $masterupdate=PNR::where('Request_ID',$CEUpdate['Request_ID'])->update(['JPN' => $jpnissue['JPN']]);
                
            $manuallogupdate = new ManualLog;
            $manuallogupdate->Request_ID = $JPNIssue['Request_ID'];
            $manuallogupdate->Description = "InESS CE Declared JPN for PNR Request";
            $manuallogupdate->Date = Carbon::now()->toDateString();
            $manuallogupdate->Causer = Auth::user()->name;
            $manuallogupdate->save();

        }
        return $jpnissue;
    }

    public function assignJCEbyMail($CEUpdate)
    {
       
        $assignedJCE=PNR::where('Request_ID',$CEUpdate['Request_ID'])->first();
        
        Mail::to('satheesh41mgm@gmail.com')->send(new AssignJCE($assignedJCE));
    }

    public function getRecentActivities()
    {
        $act = ManualLog::latest()->get();
        return $act;
    }
}
