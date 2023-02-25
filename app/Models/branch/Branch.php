<?php

namespace App\Models\branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_name',
        'company',
        'address',
        'contact_no_1',
        'contact_no_2',
        'email',
        'fax',
    ];
}
