<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $fillable = ['name','service_point_content_id'];

    public function paragraphs()
    {
        return $this->hasMany(Paragraph::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
