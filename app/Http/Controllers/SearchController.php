<?php

namespace App\Http\Controllers;
use app\Helper\commodityHelper;
use app\Helper\SearchHelper;
use Illuminate\Http\Request;
use app\Helper\PnrRequestHelper;
use App\Helper\CEHelper;
use App\Helper\JCEHelper;
use App\Helper\CoordinatorHelper;
use App\Helper\RequesterHelper;

use DB;
class SearchController extends Controller
{
   
   public function __construct(SearchHelper $searchHelper,commodityHelper $commodityHelper,PnrRequestHelper $pnrreqhelper,CEHelper $ceHelper,JCEHelper $jceHelper,CoordinatorHelper $coordinatorHelper,RequesterHelper $requesterHelper)
    {
        $this->middleware('auth');
        $this->searchHelper = $searchHelper;
        $this->commodityHelper = $commodityHelper;
        $this->pnrreqhelper = $pnrreqhelper;
        $this->ceHelper=$ceHelper;
        $this->jceHelper=$jceHelper;
        $this->coordinatorHelper=$coordinatorHelper;
        $this->requesterHelper=$requesterHelper;

    }
 public function index()
 {
 	$jce = $this->pnrreqhelper->getJCE();
 	$inessce = $this->coordinatorHelper->getInessce();
 	$commoditycode=$this->commodityHelper->getCommodityCode()->unique();

 	$allPNR = DB::table('p_n_rs')
            ->join('inessce', 'p_n_rs.Request_ID', '=', 'inessce.Request_ID')
          
            ->join('jce', 'p_n_rs.Request_ID', '=', 'jce.Request_ID')
             ->join('mpn', 'p_n_rs.Request_ID', '=', 'mpn.Request_ID')
            ->select('p_n_rs.*', 'jce.Disposition','jce.Assessment_Status', 'mpn.MFR','mpn.MPN','mpn.RoHSCOC','mpn.REACHCOC','mpn.FMD','inessce.CE_Assesment_Status','inessce.Target_FRS_date','inessce.FRS_Date_Status','inessce.EU_complaince')
            ->get();
           
 	return view('search.search',compact('commoditycode','inessce','jce','allPNR'));
 }

  public function searchbyID()
    {
        $masterdetails = array();
        
        $timeline = array();

        return view('search.searchbyRequest_ID',compact('masterdetails','timeline'));
    }

    public function searchByIdFormSubmit(Request $request)
    {
        $masterdetails = $this->searchHelper->getMasterDetails($request->Request_ID);
        $timeline = $this->searchHelper->getTimeLineDetails($request->Request_ID);
        return view('search.searchbyRequest_ID',compact('masterdetails','timeline'));
    }

}
