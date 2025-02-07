<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packagestudy extends Model
{
    protected $table = 'packagestudies';

    protected $fillable = [
       
        'package_list_title',
        'package_list_description',
        'study_id'
    ];

    public function study()
    {
        return $this->belongsTo(Study::class);
    }
}
