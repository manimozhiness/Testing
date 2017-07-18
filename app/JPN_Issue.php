<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JPN_Issue extends Model
{
    protected $table='jpn_issue';

    protected $fillable = ['Request_ID', 'JPN', 'JPN_Assigned_Date','Outline_Drawing','Schematic','Speciification','Redmine_Ticket','Redmine_Ticket_Created_Date','PNR_Status','InESS_CE'];
}