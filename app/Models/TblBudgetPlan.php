<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblBudgetPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'year_plan',
        'budget_amount',
        'budget_allocated',
        'plan_status',
    ];


}
