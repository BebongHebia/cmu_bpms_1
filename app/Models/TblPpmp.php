<?php

namespace App\Models;

use App\Models\TblBudget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function budget(){
        return $this->hasMany(TblBudget::class, 'budget_id');
    }

    public function office_college(){
        return $this->belongsTo(TblOffice::class, 'office_id');
    }

    public function budgets(){
        return $this->belongsTo(TblBudget::class, 'budget_id');
    }

    public function get_user_email(){
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
