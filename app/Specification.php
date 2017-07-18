<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $table='specifications';

    protected $fillable = ['Request_ID', 'Category', 'Name','Type','Size','Date','Uploaded_By','description','file_name'];
}

