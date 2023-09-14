<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPpmp extends Model
{
    use HasFactory;

    protected $fillable = [
        'ppmp_code',
        'user_id',
        'office_id',
        'budget_id',
        'ppmp_status',
    ];
}
