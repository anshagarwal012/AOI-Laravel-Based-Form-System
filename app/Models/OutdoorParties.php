<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutdoorParties extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'Name', 'Number', 'ShopName', 'ShopAddress'];
}
