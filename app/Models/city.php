<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'cities_title',
        'cities_list_image',
        'cities_list_place',
        'study_id' // Foreign key for relation
    ];

    public function study()
    {
        return $this->belongsTo(Study::class);
    }
}
