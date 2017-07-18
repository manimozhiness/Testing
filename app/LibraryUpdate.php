<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibraryUpdate extends Model
{
    protected $fillable = ['Request_ID', 'Library_Assessment_Status', 'Priority','Priority_Comments','Worked_By','Symbol','Footprint','Completed_BY','Completed_Date'];
}
