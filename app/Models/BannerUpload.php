<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerUpload extends Model
{
    use HasFactory;
    protected $table = 'Banner';
    public $timestamps = false;
    protected $fillable = [
        "path"
    ];
}
