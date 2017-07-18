<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CEHelper;
use App\Helper\JCEHelper;
use App\Helper\CoordinatorHelper;
use App\Helper\RequesterHelper;
use app\Mail\AssignCE;
use App\InESSCE;
use Carbon\Carbon;
use App\PNR;

class CoordinatorController extends Controller
{
   public function __construct(CEHelper $ceHelper,JCEHelper $jceHelper,CoordinatorHelper $coordinatorHelper,RequesterHelper $requesterHelper)
    {
        $this->ceHelper=$ceHelper;
        $this->jceHelper=$jceHelper;
        $this->coordinatorHelper=$coordinatorHelper;
        $this->requesterHelper=$requesterHelper;
    }


    public function assignInessCe(Request $request,$id)
    {
    	$this->coordinatorHelper->assignInessCe($request,$id);
        $this->coordinatorHelper->assignInESSCEMail($id);
        PNR::where('Request_ID',$id)->update(['PNR_CurrentStatus' => 'InESS CE Assessment Required','PNR_Status'=>'Open']);
        $this->updateInESSCEstatus($id);
       
    	return redirect()->back()->with("success","Assigned to Respective CE Successfully");
    }

    private function updateInESSCEstatus($id)
    {
        $iness= new InESSCE;
        $iness->Request_ID=$id;
        $iness->CE_Assesment_Status='CE Assessment Required';
        $iness->CE_Open_date=Carbon::now()->toDateString();

        $iness->save();

    }
}
