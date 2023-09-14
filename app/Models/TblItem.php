<?php

namespace App\Models;

use App\Models\TblItemCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TblItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_category_id',
        'item_code',
        'item_name',
        'item_description',
        'item_unit_measure',
        'item_price',
        'availability',
        'item_from',
        'item_status',
    ];

    public function category()
    {
        return $this->belongsTo(TblItemCategory::class, 'item_category_id');
    }
}
