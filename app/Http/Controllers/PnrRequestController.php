<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Helper\PnrRequestHelper;
use app\Helper\commodityHelper;
use Illuminate\Http\JsonResponse;
use app\Mail\RequestPNR;
use App\PNRNewMaster;
use App\PNR;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Specification;
use App\Project;


class PnrRequestController extends Controller
{
    public function __construct(PnrRequestHelper $pnrreqhelper,commodityHelper $commodityHelper)
    {
        $this->middleware('auth');
        $this->pnrreqhelper = $pnrreqhelper;
        $this->commodityHelper = $commodityHelper;
    }


    public function pnrRequestCreation()
    {
        $classcode=$this->commodityHelper->getClassCode()->unique();
        
        return view('pnr.requestcreation',compact('classcode'));
    }

    public function preliminaryCreation()
    {
        
         $commodity=$this->commodityHelper->getComDesc();

         $this->pnrreqhelper->removeAttachments();

         $project = Project::pluck('Project');
        
        return view('pnrrequest.preliminary',compact('commodity','project'));
    }

    public function preliminarySubmission(Request $request)
    {
      
      $preliminaryData=$request->only(['symbolFootprintNeeds','existingSchematicSymbol','NoSymbolorFootprint','existingPCBFootprint','vendorPNCount','requestorName','requestorEmail','requestedSite','requestedDate','projectName','boardName','requestorType','partType','commodityCode','symbolName','footPrintName','partDescription']);
        
        $commodityData=DB::table('commodity')->where('Commodity_Code',$preliminaryData['partType'])->first();
       
        
        return view('pnrrequest.partdata',compact('preliminaryData','commodityData'));
    }

    public function preliminarypartsubmission(Request $request)

    {
      
      $partpremilinary=$request->all();
      $reqid = $this->createID();
      $partpremilinary['Request_ID'] = $reqid;
      $mfr = $request->mfr;
      $mpn = $request->mpn;
      $files = $request->files;
      $file=$request->only(['Category','files','description']);
      $file['Request_ID'] = $reqid;
      $this->pnrreqhelper->removeAttachments();
      $this->pnrreqhelper->uploadFile($file);

      $attachments = $this->pnrreqhelper->getAttachments($reqid);
      
       return view('pnrrequest.verifypartdata',compact('partpremilinary','mfr','mpn','files','attachments'));  
    }

    
    /*public function pnrRequestSubmission(Request $request)
    {
        $input1 = $request->only(['Request_ID', 'MFR', 'MPN','MPN_Lifecycle','RoHSCOC','REACHCOC','FMD','Commited_Date','Comments']);
        $input2 = $request->only(['Request_ID','Requested_Date','Requestor_Name','Requestor_Email','Priority_Type','Part_Identified','AVL_Type','Class_Code','Class_Desc','Part_Desc','Respective_CE','Respective_JCE','JPN','Analysis_Stage','PNR_Status','Request_ID','Location_Name','Project_Name','Board_Design','Notes_to_CE','Base_JPN','Outline_Drawing','FRS_Date','Schematic','Specification','Status']);
        
        $this->pnrreqhelper->pnrRequestSubmission($input2);
        $file=$request->only(['Request_ID','Category','files','description']);
        $mpn = $input1['MPN'];
        
        if($mpn[0] != '')
        {
            $this->pnrreqhelper->pnrRequestMpnSubmission($input1);
        }
         $this->pnrreqhelper->uploadFile($file);
         $this->pnrreqhelper->mailAfterRequest($input2);
        
        return redirect()->back()->with('success','Request Created Successfully');
    }*/

    public function getCCDetails(Request $request)
    {
        $classcode=$this->commodityHelper->getCCDetails($request);

        return new JsonResponse($classcode);
    }


    public function getccDescription(Request $request)
    {
        $classcode=$this->commodityHelper->getCCDescription($request);

        return new JsonResponse($classcode);
    }

    public function savePNRRequest(Request $request)
    {
       $pcnmaster=$request->only(['Request_ID','symbolFootprintNeeds','existingSchematicSymbol','NoSymbolorFootprint','existingPCBFootprint','vendorPNCount','requestorName','requestorEmail','requestedSite','requestedDate','projectName','boardName','requestorType','partType','commodityCode','symbolName','footPrintName','pincount','partDescription','BIN_file','outlint_part_number','spec_part_number','notes_to_ce','notes_to_lib']);
       
       $pcnmaster['PNR_CurrentStatus']='Co-ordinator Approval Needed';
       $pcn=PNR::create($pcnmaster);

        $mpnRequest = $request->only(['Request_ID','MFR', 'MPN','MPN_Lifecycle','RoHSCOC','REACHCOC','FMD','Commited_Date','Comments']);
       
         $this->pnrreqhelper->approveAttachments($request->Request_ID);
         $mpn = $mpnRequest['MPN'];
        
        if($mpn[0] != '')
        {
            $this->pnrreqhelper->pnrRequestMpnSubmission($mpnRequest);
        }

        $this->pnrreqhelper->mailAfterRequest($pcnmaster);

        return redirect()->route('Preliminary')->with("success","Request Initiated Successfully");

    }


    private function createID()
        {
            $pnr = new PNR;
           
            $lastRow = $pnr::orderBy('id', 'desc')->first();
            if (!$lastRow) {
                $lastID=1;
                $export = sprintf('%05d',$lastID);
                $exportId = $export;
                return $exportId;
            }
            else {
                $lastID=($lastRow->id)+1;
                $export = sprintf('%05d',$lastID);
                $exportId = $export;
                return $exportId;
             }
                  
        }


         public function verifyFileDownload($id)
    {
  $entry = Specification::where('id',$id)->firstOrFail();
      
    $filePath= Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix($entry->Name);

    return response()->download($filePath);

    }
    public function verifyFileDelete($id)
    {
       $fileupload = Specification::find($id);

         Storage::delete($fileupload->Name);

        Specification::find($id)->delete();
        return redirect()->back()->with('success','File Deleted');  
    }
}

