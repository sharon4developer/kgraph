<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceContentSubOption extends Model
{
    use HasFactory;

    protected $fillable = ['service_content_options_id', 'value'];

    public function option()
    {
        return $this->belongsTo(ServiceContentOptions::class);
    }
}
