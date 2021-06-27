<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Customers extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'customers';
    public $timestamps = true;

    protected $fillable = [
        'full_name',
        // 'last_name',
        'address',
        'address2',
        'mobile',
        'mobile2',
        'status',
        'city',
        'email'
    ];

    public $sortable = ['full_name', 'city', 'email', 'city'];
}
