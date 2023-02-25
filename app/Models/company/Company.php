<?php

namespace App\Models\company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'logo',
        'banner',
        'contact_no_1',
        'contact_no_2',
        'email',
        'address_1',
        'address_2',
        'fax',
        'city',
        'district',
        'division',
        'state',
        'country',
        'website',
        'linkedin',
        'facebook',
        'youtube',
        'twitter',
        'instagram',
        'is_active',
        'others',
    ];
}
