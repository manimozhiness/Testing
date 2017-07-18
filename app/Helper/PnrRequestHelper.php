<?php
namespace app\Helper;

use App\PNR;
use App\Commodity;
use App\ManualLog;
use Carbon\Carbon;


use App\MPN;

use App\JCE;

use App\User;

use App\JPN_Issue;

use DB;
use App\InESSCE;
use Auth;
use App\Specification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Mail\RequestPNR;
use Illuminate\Support\Facades\Mail;


class PnrRequestHelper
{
	public function pnrRequestSubmission($input2)
	{
		$input2['PNR_CurrentStatus']='Co-ordinator Approval Needed';
		$save = PNR::firstOrCreate($input2);
	}

	public function pnrRequestMpnSubmission($input)
	{
		$Request_ID = $input['Request_ID'];
		$MFR = $input['MFR'];
		$MPN = $input['MPN'];
		$MPN_Lifecycle = $input['MPN_Lifecycle'];
		$RoHSCOC = $input['RoHSCOC'];
		$REACHCOC = $input['REACHCOC'];
		$FMD = $input['FMD'];
		$Commited_Date = $input['Commited_Date'];
		$Comments = $input['Comments'];

		for($i=0;$i<sizeof($MPN);$i++)
		{
			$mpndata = new MPN;

			$mpndata->Request_ID = $Request_ID;
			$mpndata->MFR = $MFR[$i];
			$mpndata->MPN = $MPN[$i];
			$mpndata->MPN_Lifecycle = $MPN_Lifecycle[$i];
			$mpndata->RoHSCOC = $RoHSCOC[$i];
			$mpndata->REACHCOC = $REACHCOC[$i];
			$mpndata->FMD = $FMD[$i];
			$mpndata->Commited_Date = $Commited_Date[$i];
			$mpndata->Comments = $Comments[$i];

			$mpndata->save();
		}
            $manuallogupdate = new ManualLog;
            $manuallogupdate->Request_ID = $input['Request_ID'];
            $manuallogupdate->Description = "PNR Request Initialised";
            $manuallogupdate->Date = Carbon::now()->toDateString();
            $manuallogupdate->Causer = Auth::user()->name;
            $manuallogupdate->save();
	}


	public function pnrbyid($requestid)
	{
		$pnr=PNR::where('Request_ID',$requestid)->first();
		return $pnr;
	}

	public function mpnbyid($requestid)
	{
	
		$mpn=DB::table('mpn')->where('Request_ID',$requestid)->get();
		
		return $mpn;
	}
    
    public function updateAssigned($PNRRequest)
    {
    	$PNRRequest['JCE_assignedDate'] = Carbon::now()->toDateString();
        $pnr=PNR::where('Request_ID',$PNRRequest['Request_ID'])->update($PNRRequest);
        return $pnr;
    }

    public function getFileDetails($requestid)
    {
    	$files=Specification::where('Request_ID',$requestid)->get();
		return $files;
    }

    public function updateMpn($mpnRequest)
    {
		$Request_ID = $mpnRequest['Request_ID'];
		$MFR = $mpnRequest['MFR'];
		$MPN = $mpnRequest['MPN'];
		$MPN_Lifecycle = $mpnRequest['MPN_Lifecycle'];
		$RoHSCOC = $mpnRequest['RoHSCOC'];
		$REACHCOC = $mpnRequest['REACHCOC'];
		$FMD = $mpnRequest['FMD'];
		$Commited_Date = $mpnRequest['Commited_Date'];
		$Comments = $mpnRequest['Comments'];
		
		$delete = MPN::where('Request_ID',$Request_ID)->delete();

		for($i=0;$i<sizeof($MPN);$i++)
		{
			$mpndata = MPN::updateOrCreate(
				['Request_ID' => $Request_ID,
				 'MFR' => $MFR[$i],
				 'MPN' => $MPN[$i],
				 'MPN_Lifecycle' => $MPN_Lifecycle[$i],
				 'RoHSCOC' => $RoHSCOC[$i],
				 'REACHCOC' => $REACHCOC[$i],
				 'FMD' => $FMD[$i],
				 'Commited_Date' => $Commited_Date[$i],
				 'Comments' => $Comments[$i],
				]);

		}
		 return 1;
    }
    
	public function getInessceDetails($requestid)
	{
		$details=InESSCE::where('Request_ID',$requestid)->first();
		return $details;	
	}
	public function getJpnDetails($requestid)
	{
		$details=JPN_Issue::where('Request_ID',$requestid)->first();
		return $details;	
	}
	public function getJceDetails($requestid)
	{
		$details=JCE::where('Request_ID',$requestid)->first();
		
		return $details;	
	}


	    public function uploadFile($attachedFile)
     {
     
     
     $allfiles=$attachedFile['files'];
     if($allfiles !='')
     {
     foreach ($allfiles as $files) 
     {
     		if($files != '')
     		{
            $foldername='';
            $Request_ID=$attachedFile['Request_ID']; 
            $token = strtolower(str_random(30));
            
            $fileName = $files->getClientOriginalName() ;
            $fileExtension= $files->getClientOriginalExtension();
            $fileSize=$this->byteConvert($files->getClientSize($fileName));
           
            $storingName="$Request_ID.$token.$fileName";
            $storagePath = $files->storeAs($foldername,$storingName);

            $specification = new Specification;
            $specification->Request_ID = $Request_ID;
            $specification->Category = $attachedFile['Category'];
            $specification->description = $attachedFile['description'];
            $specification->file_name = $fileName;
            $specification->Type = $fileExtension;
            $specification->Size = $fileSize;
            $specification->Uploaded_By=Auth::user()->email;
            $specification->Name=$storingName;
            $specification->Active= 0;
            $specification->save();
            }
     }
    }

    }

    private function byteConvert($bytes)
    {
         if ($bytes == 0)
                 return "0.00 B";

                 $s = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
                 $e = floor(log($bytes, 1024));

                 return round($bytes/pow(1024, $e), 2).$s[$e];
    }

    public function getJCE()
    {
    	$userid=DB::table('role_user')->where('role_id',4)->pluck('user_id');

    	$jce=User::whereIn('id',$userid)->pluck('email');

    	return $jce;
    }

   public function mailAfterRequest($requestData)
    {
     Mail::to(Auth::user()->email)->send(new RequestPNR($requestData));
    }
   public function getAttachments($reqid)
    {
     $files=Specification::where('Request_ID',$reqid)->get();

     return $files;
    }
   
   public function removeAttachments()
    {
     $files=Specification::where('Active',0)->delete();
    }

   public function approveAttachments($id)
    {
     $update = Specification::where('Request_ID',$id)->update(['Active' => 1]);

    }
}
