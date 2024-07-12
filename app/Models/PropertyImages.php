<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImages extends Model
{
    use HasFactory;

    protected $table = 'property_images';

    protected $fillable = [
        'id',
        'property_id',
        'image_type',
        'image',
    ];

    public $timestamps = true;

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
