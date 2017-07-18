<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $table='commodity';

    protected $fillable = ['Commodity_Family', 'Class_Code', 'Commodity_Code','Commodity_Description','Item_Naming_Convention','Component_Engineer','Part_Number_Creator'];
}
