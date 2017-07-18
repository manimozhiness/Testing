<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CEHelper;
use App\Helper\JCEHelper;
use App\Helper\CoordinatorHelper;
use App\Helper\RequesterHelper;
use App\Helper\PnrRequestHelper;
use App\Helper\LibraryHelper;
use App\Helper\commodityHelper;
use app\Mail\AssignCE;
use Carbon\Carbon;

class LibraryController extends Controller
{
   public function __construct(PnrRequestHelper $pnrreqhelper,CEHelper $ceHelper,JCEHelper $jceHelper,CoordinatorHelper $coordinatorHelper,RequesterHelper $requesterHelper,LibraryHelper $libraryhelper,commodityHelper $commodityHelper)
    {
        $this->ceHelper=$ceHelper;
        $this->jceHelper=$jceHelper;
        $this->coordinatorHelper=$coordinatorHelper;
        $this->requesterHelper=$requesterHelper;
        $this->libraryhelper=$libraryhelper;
        $this->pnrreqhelper=$pnrreqhelper;
        $this->commodityHelper=$commodityHelper;
    }

    public function editRequest ($requestid)
    {
        $pnr=$this->pnrreqhelper->pnrbyid($requestid);
        $mpn=$this->pnrreqhelper->mpnbyid($requestid);
        //dd($mpn);
        $inesscedetails=$this->pnrreqhelper->getInessceDetails($requestid);

        $jpndetails=$this->pnrreqhelper->getJpnDetails($requestid);
        //dd($jpndetails);
        $jcedetails=$this->pnrreqhelper->getJceDetails($requestid);

        $jce = $this->pnrreqhelper->getJCE();

        $librarydetails = $this->libraryhelper->getByID($requestid);

        $files=$this->pnrreqhelper->getFileDetails($requestid);
        $commodity=$this->commodityHelper->getComDesc();

        $libraymember = $this->libraryhelper->getMember();
        
        return view('library.Edit',compact('pnr','mpn','inesscedetails','jpndetails','jcedetails','files','jce','commodity','librarydetails','libraymember'));
    }

    public function Update(Request $request,$id)
    {
        dd($request->all());
        $libraryRequest = $request->only(['Request_ID', 'Library_Assessment_Status', 'Priority','Priority_Comments','Worked_By','Symbol','Footprint','Completed_BY','Completed_Date']);

        $update = $this->libraryhelper->update($libraryRequest);

        return redirect()->route('Library.Dashboard')->with("success","Library Parts has been updated Successfully");
    }
}
