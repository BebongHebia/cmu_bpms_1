<?php

namespace App\Models;

use App\Models\TblItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TblItemCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_category_code',
        'item_category_name',
        'item_category_description',
        'item_category_status',
    ];

    public function items()
    {
        return $this->hasMany(TblItem::class, 'id');
    }
}
