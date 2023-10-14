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
        'item_name',
        'quantity_size',
        'item_category_id',
        'purhcased_item_status',
        'date_procured',
        'jan',
        'feb',
        'mar',
        'apr',
        'may',
        'jun',
        'jul',
        'aug',
        'sep',
        'oct',
        'nov',
        'dec',
        'total_cost',
        'is_consolidated',
        'ppmp_part',
        
    ];

    public function item()
    {
        return $this->belongsTo(TblItem::class, 'item_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(TblItemCategory::class, 'item_category_id');
    }

   

    
}
