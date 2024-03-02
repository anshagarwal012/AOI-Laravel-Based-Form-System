<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashCounter extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'amount', 'payment_mode', 'status', 'remarks', 'mob', 'company', 'name'];
}
