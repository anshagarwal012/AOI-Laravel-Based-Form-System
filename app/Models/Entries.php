<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entries extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "status",
        "mobileCompany",
        "mobileModel",
        "mobileImei",
        "mobileProblem",
        "customerName",
        "customerMobile",
        "entryDate",
        "expenses",
        "advancePayment",
        "remarks",
        "dischargeName",
        "dischargeAmount",
        "advanceAmount",
        "dischargeUserAmount",
        "dischargeDate",
        "commissionAmount",
        "serialNo",
        "accessories1",
        "accessories2",
        "accessories3",
        "accessories4",
        "accessories5",
        "otherAccessories",
    ];
}
