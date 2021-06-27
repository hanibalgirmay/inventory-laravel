<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Vendors extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'mobile2',
        'address',
        'address2',
        'status',
        'city',
    ];

    public $sortable = ['name', 'email', 'status', 'city'];
}
