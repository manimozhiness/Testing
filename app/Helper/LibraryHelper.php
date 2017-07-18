<?php
namespace App\Helper;
use DB;
use App\PNR;
use App\LibraryUpdate;
use App\User;
class LibraryHelper
{

public function assignedRequest()
{
	

     $assigned = DB::table('p_n_rs')
            ->join('library_updates', 'p_n_rs.Request_ID', '=', 'library_updates.Request_ID')
            
            ->select('p_n_rs.Request_ID','p_n_rs.requestorName','p_n_rs.requestedDate','p_n_rs.Respective_JCE','library_updates.*' )
            ->where('p_n_rs.symbolFootprintNeeds','!=','No Symbol or Footprint Needed')
			->where('p_n_rs.PNR_Status', '=', 'Closed')
            ->whereNull('p_n_rs.symbolName')
            //->orwhere('p_n_rs.symbolName','=',null)
           //  ->orwhere('p_n_rs.footPrintName','=',null)
            ->orwhereNull('p_n_rs.footPrintName')
            ->whereNotNull('p_n_rs.Respective_CE')
            ->whereNotNull('p_n_rs.Respective_JCE')
            ->whereNotNull('p_n_rs.JPN')
            ->get()->toArray();
     return $assigned;

}

 public function getByID($requestid)
    {
        $details = LibraryUpdate::where('Request_ID',$requestid)->first();

        return $details;
    } 

    public function getMember()
    {
        $memberid = DB::table('role_user')->where('role_id',7)->pluck('user_id');

        $member = User::whereIn('id',$memberid)->pluck('name');

        return $member;
    }

    public function update($libraryRequest)
    {
        if($libraryRequest['Library_Assessment_Status'] == 'Assessment Completed')
        {
            $update = LibraryUpdate::where('Request_ID',$libraryRequest['Request_ID'])->update($libraryRequest);

            $pnrupdate = PNR::where('Request_ID',$libraryRequest['Request_ID'])->update([
                'symbolName' =>$libraryRequest['Symbol'],
                'footPrintName' =>$libraryRequest['Footprint'] ]);
        }

        else
        {
            $libraryRequest['Completed_BY'] = '';
            $libraryRequest['Completed_Date'] = '';
            $update = LibraryUpdate::where('Request_ID',$libraryRequest['Request_ID'])->update($libraryRequest);
        }
    }


}

