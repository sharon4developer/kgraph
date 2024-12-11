<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    use HasFactory;

    protected $fillable = ['title_id', 'content'];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }
}
