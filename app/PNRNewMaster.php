<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PNRNewMaster extends Model
{
    protected $fillable =    ['InessPNRNumber','JuniperPNRNumber','symbolFootprintNeeds','existingSchematicSymbol','NoSymbolorFootprint','existingPCBFootprint','vendorPNCount','requestorName','requestorEmail','requestedSite','requestedDate','projectName','boardName','requestorType','partType','commodityCode','symbolName','footPrintName','pincount','partDescription','BIN_file','outlint_part_number','spec_part_number','notes_to_ce','notes_to_lib'];
}
