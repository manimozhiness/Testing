<?php

namespace app\Helper;
use App\Commodity;
use App\ManualLog;
use DB;

class commodityHelper
{

public function getClassCode()
{
	$classcode=Commodity::pluck('Class_Code');
	return $classcode;
}

public function getCCDetails($request)
{
	$classcodee=Commodity::where('Commodity_Code',$request->cc)->pluck('Commodity_Description');

	return $classcodee;
}
public function getComDesc()
{
	$classdesc=Commodity::select('Commodity_Description','Commodity_Code','Commodity_Family')->get();

	return $classdesc;
}

public function getCCDescription($request)
{
	$data = explode('=>',$request->cc);
	$classcodee=Commodity::where('Commodity_Code',$data[0])->first();
	
	return $classcodee;
}
public function getCommodityCode()
{
 $commoditycode=Commodity::pluck('Commodity_Code');
 return $commoditycode;
}

public function commodityall()
{

	$commodity=DB::table('commodity')->get();
	return $commodity;
}

}