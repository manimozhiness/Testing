<?php


namespace App\Helper;
use Charts;
use App\PNR;
use Auth;
class ChartHelper{


   public function Priority()
   {
   

       $chart = Charts::database(PNR::all(), 'pie', 'highcharts')
          ->title('Priority')
          ->dimensions(420, 150)
          ->responsive(false)
          
          ->groupBy('Priority_Type', null, ['Expedited(3 Days)' => 'Expedited(3 Days)', 'Standard(7 Days)' => 'Standard(7 Days)', 'Immediate' => 'Immediate']);

          return $chart;
   }

   public function PNRStatus()
   {
   	$chart = Charts::database(PNR::all(), 'pie', 'highcharts')
          ->title('PNR Status')
          ->dimensions(370, 150)
          ->responsive(false)
       
          ->groupBy('PNR_Status', null, ['Open' => 'Open', 'Closed' => 'Closed', 'Cancel' => 'Cancel']);

          return $chart;
   }

   public function InESSCEassigned()
   {

   	$data = PNR::where('Respective_CE',Auth::user()->email)->get();

$chart = Charts::database($data, 'pie', 'highcharts')
          ->title('PNR Status')
          ->dimensions(400, 150)
          ->responsive(false)
          ->groupBy('PNR_Status', null, ['Open' => 'Open', 'Closed' => 'Closed', 'Cancel' => 'Cancel']);
return $chart;

  
   }

   public function JCEassigned()
   {

   	$data = PNR::where('Respective_JCE',Auth::user()->email)->get();

$chart = Charts::database($data, 'pie', 'highcharts')
		  ->title('PNR Status')
          ->dimensions(400, 150)
          ->responsive(false)
       
         
          ->groupBy('PNR_Status', null, ['Open' => 'Open', 'Closed' => 'Closed', 'Cancel' => 'Cancel']);
return $chart;

  
   }



}