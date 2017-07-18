<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JCE extends Model
{
   protected $table='jce';

    protected $fillable = ['Request_ID', 'Assessment_Status', 'Disposition','Recommedation','AVL_TYPE','Component_Life_Cycle','CQTR','MPN_Lifecycle_phase','Technical_Risk','Free_PCBA_Assembly'];
}
 