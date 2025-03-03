<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Gate;

class ServiceContentOptions extends Model
{
    use HasFactory;

    protected $fillable = ['title_id', 'value'];

    public function title()
    {
        return $this->belongsTo(ServiceContentTitle::class);
    }

    public function subOptions()
    {
        return $this->hasMany(ServiceContentSubOption::class);
    }
}
