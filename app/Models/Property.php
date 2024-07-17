<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $fillable = [
        'title',
        'price',
        'image',
        'beds',
        'baths',
        'sq_ft',
        'home_type',
        'type',
        'year_built',
        'price_sqft',
        'more_info',
        'location',
        'agent_name',
    ];

    public $timestamps = true;

    public function images()
    {
        return $this->hasMany(PropertyImages::class, 'property_id');
    }

    public function contactAgents()
    {
        return $this->hasMany(ContactAgent::class, 'property_id');
    }

    public function userProperties()
    {
        return $this->hasMany(UserProperty::class, 'property_id');
    }
}
