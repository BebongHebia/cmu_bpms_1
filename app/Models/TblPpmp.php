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

    
}
