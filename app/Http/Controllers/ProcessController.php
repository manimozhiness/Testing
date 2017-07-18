<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PNR;
use app\Helper\PnrRequestHelper;
use App\Helper\CEHelper;
use App\Helper\JCEHelper;
use App\Helper\CoordinatorHelper;
use App\Helper\RequesterHelper;
use App\Helper\commodityHelper;
use App\Http\Requests;
use App\Specification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ProcessController extends Controller
{
    public function __construct(PnrRequestHelper $pnrreqhelper,CEHelper $ceHelper,JCEHelper $jceHelper,CoordinatorHelper $coordinatorHelper,RequesterHelper $requesterHelper,commodityHelper $commodityHelper)
    {
        $this->middleware('auth');
        $this->pnrreqhelper = $pnrreqhelper;
        $this->ceHelper=$ceHelper;
        $this->jceHelper=$jceHelper;
        $this->coordinatorHelper=$coordinatorHelper;
        $this->requesterHelper=$requesterHelper;
        $this->commodityHelper=$commodityHelper;
    }
 

   public function getByID($requestid)
   {
      

   	$pnr=$this->pnrreqhelper->pnrbyid($requestid);
   	$mpn=$this->pnrreqhelper->mpnbyid($requestid);
    //dd($mpn);
   	$inesscedetails=$this->pnrreqhelper->getInessceDetails($requestid);
    
    $jpndetails=$this->pnrreqhelper->getJpnDetails($requestid);
    //dd($jpndetails);
    $jcedetails=$this->pnrreqhelper->getJceDetails($requestid);

    $jce = $this->pnrreqhelper->getJCE();

    $files=$this->pnrreqhelper->getFileDetails($requestid);
    $commodity=$this->commodityHelper->getComDesc();
    
   	return view('pnr.ceprocess',compact('pnr','mpn','inesscedetails','jpndetails','jcedetails','files','jce','commodity'));
   }


   public function PNRUpdate(Request $request,$requestid)
   {

    $mpnRequest = $request->only(['Request_ID', 'MFR', 'MPN','MPN_Lifecycle','RoHSCOC','REACHCOC','FMD','Commited_Date','Comments']);

$PNRRequest = $request->only('Request_ID','requestorName','requestorEmail','requestedSite','requestedDate','projectName','boardName','requestorType','commodityCode','partType','symbolName','footPrintName','PNR_Status','JPN');

  $InESSCE =$request->only(['Request_ID', 'CE_Open_date', 'CE_Assesment_Status','JCE','CE_Recommedation','AVL_TYPE','Component_Life_Cycle','CQTR']);

  $JPNIssue=$request->only(['Request_ID', 'JPN', 'JPN_Assigned_Date','Outline_Drawing','Schematic','Speciification','Redmine_Ticket','Redmine_Ticket_Created_Date','PNR_Status','InESS_CE']);

  $JCE=$request->only(['Request_ID', 'Assessment_Status', 'Disposition','Recommedation','Technical_Risk','Free_PCBA_Assembly']);

  $file=$request->only(['Request_ID','Category','files','description']);

  $PNRUpdate= $this->pnrreqhelper->updateAssigned($PNRRequest);
  $mpnupdate = $this->pnrreqhelper->updateMpn($mpnRequest);
  $CEUpdate=$this->ceHelper->updateCEData($InESSCE);
  $JPNAssign=$this->ceHelper->JPNCreate($JPNIssue);
  $JCEUpdate=$this->jceHelper->updateByJCE($JCE);
  $this->pnrreqhelper->uploadFile($file);

  return redirect()->route('home')->with('success','Data Updated Successfully');
   }


   public function downloadAttachment($filename)
    {
    
    $entry = Specification::where('Name', '=', $filename)->firstOrFail();
      
    $filePath= Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix($entry->Name);

    return response()->download($filePath);

       
    }
  public function destroy($id)
    {
        
                        
        $fileupload = Specification::find($id);

         Storage::delete($fileupload->Name);

        Specification::find($id)->delete();
                

                 
        return redirect()->back()->with('success','File Deleted');  
           

    }


}

