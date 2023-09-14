<?php

namespace App\Models;

use App\Models\TblOffice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TblBudget extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'year_allocated',
        'budget_amount',
        'budget_status',
        'budget_plan_id',
    ];

    public function office()
    {
        return $this->belongsTo(TblOffice::class, 'office_id');
    }
}
