<?php

namespace App\Models;

use App\Models\TblItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TblPurchasedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'item_code',
        'ppmp_id',
        'user_id',
        'budget_id',
        'office_id',
        'quantity_size',
        'item_category_id',
        'purhcased_item_status',
        'date_procured',
        'is_consolidated',
        'ppmp_part',
        
    ];

    public function items(){
        return $this->hasMany(TblItem::class, 'item_id');
    }
}
