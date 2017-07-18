<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PNR;
use app\Helper\PnrRequestHelper;
use App\Helper\CEHelper;
use App\Helper\JCEHelper;
use App\Helper\CoordinatorHelper;
use App\Helper\RequesterHelper;
use App\Helper\ReportHelper;
use App\Http\Requests;
use App\Specification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ReportController extends Controller
{
    public function __construct(PnrRequestHelper $pnrreqhelper,CEHelper $ceHelper,JCEHelper $jceHelper,CoordinatorHelper $coordinatorHelper,ReportHelper $reporthelper)
    {
        $this->middleware('auth');
        $this->pnrreqhelper = $pnrreqhelper;
        $this->ceHelper=$ceHelper;
        $this->jceHelper=$jceHelper;
        $this->coordinatorHelper=$coordinatorHelper;
        
        $this->reporthelper=$reporthelper;
    }


    public function reports()
    {
    	$masterdetails = array();

    	$inesscedetails = array();

    	$jpndetails = array();

    	$jcedetails = array();

    	return view('report.report',compact('masterdetails','inesscedetails','jpndetails','jcedetails'));
    }

    public function reportFormSubmit(Request $request)
    {
    	$pnrreqid = $this->reporthelper->getRequestId($request);

    	$masterdetails = $this->reporthelper->getMasterDetails($pnrreqid);

    	$inesscedetails = $this->reporthelper->getInessceDetails($pnrreqid);

    	$jpndetails = $this->reporthelper->getJpnDetails($pnrreqid);

    	$jcedetails = $this->reporthelper->getJceDetails($pnrreqid);
       
    	return view('report.report',compact('masterdetails','inesscedetails','jpndetails','jcedetails'));
    }
}
