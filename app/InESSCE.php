<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InESSCE extends Model
{
    protected $table='inessce';

    protected $fillable = ['Request_ID', 'CE_Open_date', 'CE_Assesment_Status','JCE','Target_FRS_date','FRS_Date_Status','Change_FRS_Date','CE_Recommedation','History','EU_complaince','AVL_TYPE','Component_Life_Cycle','CQTR'];
}