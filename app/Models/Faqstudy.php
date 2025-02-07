<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faqstudy extends Model
{
    protected $table = 'faqstudies';

    protected $fillable = [
        'faq_question',
        'faq_answer',
        'study_id' // Foreign key for relation
    ];

    public function study()
    {
        return $this->belongsTo(Study::class);
    }
}
