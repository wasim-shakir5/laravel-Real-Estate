<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactAgent extends Model
{
    use HasFactory;

    protected $table = 'contact_agent';

    protected $fillable = [
        'id',
        'property_id',
        'user_id',
        'agent_name',
        'name',
        'email',
        'phone',
        'message',
    ];

    public $timestamps = true;

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
