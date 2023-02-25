<?php

namespace App\Models\leave;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;

    protected $fillable = [
        'leave_type',
        'description',
        'max_day',
        'status'
    ];
}
