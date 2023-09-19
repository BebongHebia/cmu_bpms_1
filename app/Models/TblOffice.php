<?php

namespace App\Models;

use App\Models\TblBudget;
use App\Models\TblDepartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TblOffice extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_type',
        'office_name',
        'office_desc',
        'office_status',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'office_id');
    }

    public function budgets()
    {
        return $this->hasMany(TblBudget::class, 'office_id');
    }

    public function departments(){
        return $this->hasMany(TblDepartment::class, 'office_id');
    }

}
