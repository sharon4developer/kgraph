<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceContentTitle extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'service_content_point_id'];

    public function paragraphs()
    {
        return $this->hasMany(ServiceContentParagraph::class);
    }

    public function options()
    {
        return $this->hasMany(ServiceContentOptions::class);
    }
}
