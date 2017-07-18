<?php
namespace App\Helper;
use App\PNR;
use Auth;
use App\Commodity;
use App\ManualLog;
use Carbon\Carbon;
use App\User;
use DB;
use App\Mail\AssignCE;
use Illuminate\Support\Facades\Mail;

class CoordinatorHelper
{
	
	public function assignedrequest()
	{
           //$assigned=PNR::where('Respective_CE',Auth::user()->email)->get();

		//$assigned=PNR::where('Respective_CE','=',' ')->get();
    $assigned=DB::table('p_n_rs')->whereNull('Respective_CE')->get();
    
        return $assigned;
	}

	public function getInessce()
	{
		$inessceid = DB::table('role_user')->where('role_id',3)->pluck('user_id');

		$inessce = User::whereIn('id',$inessceid)->pluck('email');

		return $inessce;
	}

	 public function assignInessCe($request,$id)
 {
  $update = PNR::where('Request_ID',$id)->update([
                    'Respective_CE' => $request->Respective_CE,
                    'CE_assignedDate' => Carbon::now()->toDateString()]);
            $manuallogupdate = new ManualLog;
            $manuallogupdate->Request_ID = $id;
            $manuallogupdate->Description = "Coordinator Has Assigned Respective InESS CE For PNR Request";
            $manuallogupdate->Date = Carbon::now()->toDateString();
            $manuallogupdate->Causer = Auth::user()->name;
            $manuallogupdate->save();

  $this->assignInESSCEMail($id);
 }
public function assignInESSCEMail($id)
    {
     $assignedCE=PNR::where('Request_ID',$id)->first();
     
        Mail::to('InESSkkl@inesssolutions.com')->send(new AssignCE($assignedCE));
    }

}
