<?php

namespace App\Helper;

use App\ManualLog;

use DB;

class SearchHelper
{
	public function getMasterDetails($id)
	{
		$pnr = DB::table('p_n_rs')
            ->join('inessce', 'p_n_rs.Request_ID', '=', 'inessce.Request_ID')
          
            ->join('jce', 'p_n_rs.Request_ID', '=', 'jce.Request_ID')
           
            ->select('p_n_rs.*', 'jce.Disposition','jce.Assessment_Status', 'inessce.CE_Assesment_Status')
            ->first();

        return $pnr;
	}
	public function getTimeLineDetails($id)
	{
		$timeline = ManualLog::where('Request_ID',$id)->get();
		return $timeline;
	}
}