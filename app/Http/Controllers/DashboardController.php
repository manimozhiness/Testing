<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CEHelper;
use App\Helper\JCEHelper;
use App\Helper\CoordinatorHelper;
use App\Helper\RequesterHelper;
use Charts;
use App\Helper\ChartHelper;
use app\Helper\commodityHelper;
use App\Helper\LibraryHelper;
use DB;
class DashboardController extends Controller
{
   public function __construct(CEHelper $ceHelper,JCEHelper $jceHelper,CoordinatorHelper $coordinatorHelper,RequesterHelper $requesterHelper,ChartHelper $chartHelper,commodityHelper $commodityHelper,LibraryHelper $libraryHelper)
    {
        $this->ceHelper=$ceHelper;
        $this->jceHelper=$jceHelper;
        $this->coordinatorHelper=$coordinatorHelper;
        $this->requesterHelper=$requesterHelper;
        $this->chartHelper=$chartHelper;
        $this->commodityHelper = $commodityHelper;
        $this->libraryHelper=$libraryHelper;
    }

  public function CEdashboard()
  {
          $assignedrequest=$this->ceHelper->assignedrequest();

          $activity = $this->ceHelper->getRecentActivities();
           $pnrstatus=$this->chartHelper->InESSCEassigned();
            $commodity=$this->commodityHelper->commodityall();
          return view('dashboard.cedashboard',compact('assignedrequest','activity','pnrstatus','commodity'));
    	
  }

  public function JCEdashboard()
  {
  	$assignedrequest=$this->jceHelper->assignedrequest();
    $activity = $this->ceHelper->getRecentActivities();
 $pnrstatus=$this->chartHelper->JCEassigned();
  $commodity=$this->commodityHelper->commodityall();
  	return view('dashboard.jcedashboard',compact('assignedrequest','activity','pnrstatus','commodity'));
  }

  public function Coordinatordashboard()
  {
  	$inessce = $this->coordinatorHelper->getInessce();

  	$assignedrequest=$this->coordinatorHelper->assignedrequest();

    $activity = $this->ceHelper->getRecentActivities();
   
   $priority=$this->chartHelper->Priority();
    $pnrstatus=$this->chartHelper->PNRStatus();

    $commodity=$this->commodityHelper->commodityall();
  	return view('dashboard.coordinatordashboard',compact('assignedrequest','inessce','activity','pnrstatus','priority','commodity'));
  }
  
  public function Requestordashboard()
  {
    
  $assignedrequest=$this->requesterHelper->assignedrequest();
    $commodity=$this->commodityHelper->commodityall();
    $activity = $this->requesterHelper->getRecentActivities($assignedrequest->pluck('Request_ID'));
    return view('dashboard.requestordashboard',compact('assignedrequest','activity','commodity'));
 
  	
  	
  }


  public function Librarydashboard()
  {
      $assigned=$this->libraryHelper->assignedRequest();
     
      $assignedrequest = array_flatten($assigned);
     //dd($assignedrequest);

      return view('dashboard.librarydashboard',compact('assignedrequest'));
  }


}
