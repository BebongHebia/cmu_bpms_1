<?php

namespace App\Models;

use App\Models\TblOffice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TblDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'dept_name',
        'dept_description',
        'dept_status',
    ];

    public function office()
{
    return $this->belongsTo(TblOffice::class, 'office_id');
}
}
