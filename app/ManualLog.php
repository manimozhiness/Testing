<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManualLog extends Model
{
    protected $fillable = ['Request_ID', 'Description', 'Date','Causer'];
}
