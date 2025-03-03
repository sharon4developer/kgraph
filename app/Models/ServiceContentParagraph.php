<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceContentParagraph extends Model
{
    use HasFactory;

    protected $fillable = ['service_content_title_id', 'content'];

    public function title()
    {
        return $this->belongsTo(ServiceContentTitle::class);
    }
}
