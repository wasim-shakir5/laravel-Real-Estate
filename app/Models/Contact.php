<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'full_name',
        'email',
        'subject',
        'message',
        'ip_address',
        'user_agent',
        'device_type',
        'browser_type',
        'os_type',
    ];

    public $timestamps = true;
}
