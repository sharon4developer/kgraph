<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['title_id', 'value'];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function subOptions()
    {
        return $this->hasMany(SubOption::class);
    }
}
