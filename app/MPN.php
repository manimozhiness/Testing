<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPN extends Model
{
    protected $table='mpn';

    protected $fillable = ['Request_ID', 'MFR', 'MPN','MPN_Lifecycle','RoHSCOC','REACHCOC','FMD','Commited_Date','Comments'];

 }



 