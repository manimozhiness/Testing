<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PNR extends Model
{
   
  protected $table='p_n_rs';

  protected $fillable=['Request_ID','symbolFootprintNeeds','existingSchematicSymbol','NoSymbolorFootprint','existingPCBFootprint','vendorPNCount','requestorName','requestorEmail','requestedSite','requestedDate','projectName','boardName','requestorType','partType','commodityCode','symbolName','footPrintName','pincount','partDescription','outlint_part_number','spec_part_number','notes_to_ce','notes_to_lib','Respective_CE','CE_assignedDate','Respective_JCE','JCE_assignedDate','PNR_Status','PNR_Approval_Status','PNR_CurrentStatus','JPN','PNR_statusby_date','PNR_approvalstatusby_date','PNR_CurrentStatusby_date'];

  






















}
