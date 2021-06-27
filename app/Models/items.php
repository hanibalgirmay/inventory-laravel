<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class items extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'items';
    public $timestamps = true;

    protected $cast_data = [
        'stock' => 'number',
        'unit_price' => 'number',
        'discount' => 'number',
    ];

    protected $fillable = [
        'item_name',
        'stock',
        'unit_price',
        'description',
        'discount',
        'image_url'
    ];

    public $sortable = ['item_name', 'stock', 'unit_price', 'discount'];
}
